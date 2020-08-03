<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \App\Goods;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart',[]);

        return view('index', [
            'cartData' => \App\Cart::buildCartData(),
            'cartQuantity' => array_reduce ( $cart ,  function($v, $e){ return $v+$e; }, 0 ),
            'pizzas' => Goods::getAllPizzas(),
            'salads' => Goods::getAllSalads(),
            'beverages' => Goods::getAllBeverages()
        ]);
    }
}
