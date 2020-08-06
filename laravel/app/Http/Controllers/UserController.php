<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends HomeController
{
    //
    public function listOrders(Request $request){
          return view('pastOrders', ['orders' => Order::where('user_id', Auth::id())->orderBy('created_at','desc')->get()]);
    }
}
