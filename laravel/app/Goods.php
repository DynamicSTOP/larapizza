<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Goods extends Model
{
    //
    private static function getAllByType($type)
    {
        return Goods::where('type', $type)->orderBy('name')->get();
    }

    public static function getAllPizzas()
    {
        return Goods::getAllByType('pizza');
    }

    public static function getAllBeverages()
    {
        return Goods::getAllByType('beverages');
    }

    public static function getAllSalads()
    {
        return Goods::getAllByType('salads');
    }

    public function getImage(){
        if(empty($this->image)){
            return '/images/placeholder.jpg';
        }
        return $this->image;
    }

    public function getPrice(){
        $currency = Session::get('currency', 'euro');
        if ($currency === 'euro') {
            return $this->price_euro;
        } else {
            return $this->price_usd;
        }
    }
}
