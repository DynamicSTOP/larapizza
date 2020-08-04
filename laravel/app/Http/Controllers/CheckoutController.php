<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function show(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $delivery = $request->session()->get('delivery');
        if (empty($delivery)) {
            $delivery = rand(40, 150) * 10;
            $request->session()->put('delivery', $delivery);
        }
        return view('checkout', [
            'cartData' => \App\Cart::buildCartData(),
            'cartQuantity' => array_reduce($cart, function ($v, $e) {
                return $v + $e;
            }, 0),
            'hideCheckoutLink' => true,
            'delivery' => $delivery
        ]);
    }

    public function order(Request $request){
        $cart = $request->session()->get('cart', []);
        //do stuff with cart and goods
        $request->session()->remove('cart');
        $request->session()->remove('delivery');
        return view('orderSuccess');
    }
}
