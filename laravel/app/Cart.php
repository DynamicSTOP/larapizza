<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    //

    public static function buildCartData()
    {
        $cart = Session::get('cart', []);
        $goods = Goods::select(['id', 'price_usd', 'price_euro', 'name', 'type'])
            ->whereIn('id', array_keys($cart))
            ->orderBy('type', 'desc')
            ->orderBy('name', 'desc')
            ->get();
        return ['goods' => $goods, 'cart' => $cart];
    }
}
