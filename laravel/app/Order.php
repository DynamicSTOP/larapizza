<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'address', 'phone', 'comment', 'currency', 'delivery'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }
}
