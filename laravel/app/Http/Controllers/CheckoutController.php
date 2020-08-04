<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function show(Request $request)
    {
        $cart = $request->session()->get('cart',[]);
        return view('checkout',[
            'cartData' => \App\Cart::buildCartData(),
            'cartQuantity' => array_reduce ( $cart ,  function($v, $e){ return $v+$e; }, 0 ),
        ]);
    }
}
