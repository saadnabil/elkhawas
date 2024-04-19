<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //
    public function index(){
        $orders = Order::where([
            'user_id' => auth()->user()->id,
        ])->get();
        return view('user.orders.index',compact('orders'));
    }
}
