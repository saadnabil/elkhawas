<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function order(){
        return response()->view('admin.orders.orders');
    }
    public function OrderDetails(){
        return response()->view('admin.orders.order-details');
    }
    
    
    
    public function orderTrack(){
        return response()->view('admin.orders.show-track-change-orders');
    }

    public function ordertrackdetails(){
        return response()->view('admin.orders.track-orders-details');
    }
    //
}
