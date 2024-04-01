<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\ValidateAdminLogin;
use Illuminate\Support\Facades\Auth;

class DashobardController extends Controller
{
   public function index(){
        return view('admin.home');
   }
}
