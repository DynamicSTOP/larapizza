<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = [
        'quantity', 'price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
