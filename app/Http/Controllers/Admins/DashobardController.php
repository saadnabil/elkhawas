<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\ValidateAdminLogin;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashobardController extends Controller
{
   public function index(){

      $totalUser = User::count();
      $totalAdmin = Admin::count();

        return view('admin.home',compact('totalUser','totalAdmin'));
   }
}
