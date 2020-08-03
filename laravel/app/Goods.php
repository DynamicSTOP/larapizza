<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
