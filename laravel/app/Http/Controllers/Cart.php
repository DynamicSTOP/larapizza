<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class Cart extends Controller
{
    public function show()
    {
        return \App\Cart::buildCartData();
    }

    //
    public function addItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'exists:goods,id'],
            'quantity' => ['Numeric', 'min:1', 'max:20'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()])->setStatusCode(400);
        }

        $id = $request->input('id');
        $quantity = $request->input('quantity', 1);

        $cart = Session::get('cart', []);
        $cart[$id] = $quantity;
        Session::put('cart', $cart);
        return $cart;
    }


    public function removeItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'exists:goods,id']
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()])->setStatusCode(400);
        }
        $id = $request->input('id');
        $cart = $request->session()->get('cart', []);
        if (!isset($cart[$id])) {
            return response(['errors' => ['id' => 'not in cart']])->setStatusCode(400);
        }
        unset($cart[$id]);
        $request->session()->put('cart', $cart);
        return $cart;
    }
}
