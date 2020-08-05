<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function listOrders(Request $request){
        return view('pastOrders', ['orders' => Order::where('id', Auth::id())->get()]);
    }
}
