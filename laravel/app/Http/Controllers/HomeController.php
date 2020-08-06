<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use \App\Goods;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        return view('index', [
            'cartData' => \App\Cart::buildCartData(),
            'cartQuantity' => array_reduce($cart, function ($v, $e) {
                return $v + $e;
            }, 0),
            'goodsCategories' => [
                'pizzas' => Goods::getAllPizzas(),
                'salads' => Goods::getAllSalads(),
                'beverages' => Goods::getAllBeverages()
            ]
        ]);
    }

    public function menu(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        return view('menu', [
            'cartData' => \App\Cart::buildCartData(),
            'cartQuantity' => array_reduce($cart, function ($v, $e) {
                return $v + $e;
            }, 0),
            'goodsCategories' => [
                'pizzas' => Goods::getAllPizzas(),
                'salads' => Goods::getAllSalads(),
                'beverages' => Goods::getAllBeverages()
            ]
        ]);
    }

    public function toggleCurrency(Request $request)
    {
        $currency = $request->session()->get('currency', 'euro');
        if ($currency === 'euro') {
            $currency = 'usd';
        } else {
            $currency = 'euro';
        }
        $request->session()->put('currency', $currency);
        return ['currency' => $currency];
    }

    public function dummy(){
        return view('dummy');
    }
}
