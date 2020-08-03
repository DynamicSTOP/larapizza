<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Cart extends Controller
{
    public function show(Request $request)
    {
        return $request->session()->get('cart', []);
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

        $cart = $request->session()->get('cart', []);
        $cart[$id] = $quantity;
        $request->session()->put('cart', $cart);
        return $cart;
    }


    public function removeItem(Request $request, $id)
    {
        // TODO check if exists in cart

        $cart = $request->session()->get('cart', []);
        unset($cart[$id]);
        $request->session()->set('cart', $cart);
        return $cart;
    }
}
