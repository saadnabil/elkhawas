<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class DashobardController extends Controller
{
   public function index(){
        return view('user.home');
   }
}
