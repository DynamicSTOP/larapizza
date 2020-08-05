<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{
    private function renderCheckoutPage(Request $request, $errors = false)
    {
        $cart = $request->session()->get('cart', []);
        if (count($cart) === 0) {
            return redirect()->route('index');
        }
        $delivery_euro = $request->session()->get('delivery_euro');
        $delivery_usd = $request->session()->get('delivery_usd');
        if (empty($delivery_euro)) {
            $delivery_euro = rand(40, 150) * 10;
            $request->session()->put('delivery_euro', $delivery_euro);
            $delivery_usd = rand(40, 150) * 10;
            $request->session()->put('delivery_usd', $delivery_usd);
        }
        $data = [
            'cartData' => \App\Cart::buildCartData(),
            'cartQuantity' => array_reduce($cart, function ($v, $e) {
                return $v + $e;
            }, 0),
            'hideCheckoutLink' => true,
            'delivery_euro' => $delivery_euro,
            'delivery_usd' => $delivery_usd,
        ];

        if ($errors) {
            $data['errors'] = $errors;
        }

        return view('checkout', $data);
    }

    //
    public function show(Request $request)
    {
        return $this->renderCheckoutPage($request);
    }

    public function order(Request $request)
    {
        $cart = \App\Cart::buildCartData();
        if (count($cart['goods']) === 0) {
            // TODO dead session, maybe middleware can help here
            return redirect()->route('index');
        }

        $orderData = $request->validate([
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'present|max:255',
            'address' => 'required|min:3|max:255',
            'phone' => 'required|numeric',
            'currency' => ['required', Rule::in(['usd', 'euro'])],
            'comment' => 'present'
        ]);

        $orderData['last_name'] = $orderData['region_id'] ?? '';
        $orderData['comment'] = $orderData['comment'] ?? '';
        $orderData['delivery'] = $request->session()->get($orderData['currency'] === 'euro' ? 'delivery_euro' : 'delivery_usd');
        if (Auth::check()) {
            $orderData['user_id'] = Auth::id();
        }

        DB::beginTransaction();
        $order = new Order($orderData);
        $order->save();

        foreach ($cart['goods'] as $goods) {
            $orderItem = new OrderItem([
                'price' => $order->currency === 'euro' ? $goods->price_euro : $goods->price_usd,
                'quantity' => $cart['cart'][$goods->id]
            ]);
            $orderItem->order()->associate($order);
            $orderItem->goods()->associate($goods);
            $orderItem->save();
        }
        DB::commit();

        if (Auth::check()) {
            // updating user contacts
            $user = Auth::user();
            $user->address = $orderData['address'];
            $user->name = $orderData['first_name'];
            $user->save();
        }


        $request->session()->remove('cart');
        $request->session()->remove('delivery');
        return view('orderSuccess', ['order' => $order]);
    }
}
