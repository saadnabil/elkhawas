<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
   public function index(){
        $user = auth()->user()->load('coupons');
        $coupons = $user->coupons;
        return view('user.coupons.index', compact('coupons'));
   }
}
