<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CartController extends HomeController
{
    public function show()
    {
        return \App\Cart::buildCartData();
    }

    //
    public function updateItem(Request $request)
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

        if (strtoupper($request->getMethod()) === 'PUT') {
            if (isset($cart[$id])) {
                $cart[$id] += $quantity;
            } else {
                $cart[$id] = $quantity;
            }
        } else {
            $cart[$id] = $quantity;
        }
        Session::put('cart', $cart);
        return [
            'totalInCart' => array_reduce($cart, function ($t, $e) {
                return $t + $e;
            }, 0),
            'html' => View::make('partial.cartSidebar', ['cartData' => \App\Cart::buildCartData()])->render()
        ];
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
        return [
            'totalInCart' => array_reduce($cart, function ($t, $e) {
                return $t + $e;
            }, 0),
            'html' => View::make('partial.cartSidebar', ['cartData' => \App\Cart::buildCartData()])->render()
        ];
    }
}
