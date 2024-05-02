<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admins\ValidateAdminLogin;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashobardController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:dashboard', ['only' => ['index']]);

    }
   public function index(){

      $totalUser = User::count();
      $totalAdmin = Admin::count();

      // $totalOrder = order::where('status','!=','cancelled')->count();
      $totalOrder = order::where('status','!=','')->count();

      $totalRenvue = order::where('status','!=','cancelled')->sum('total_price');


      /////this mount renvue

      $startOfMounth =Carbon::now()->startOfMonth()->format('Y-m-d');
      $currentDate =Carbon::now()->format('Y-m-d');

      $renvueThisMount = order::where('status','!=','cancelled')
      ->whereDate('created_at','>=',$startOfMounth)
      ->whereDate('created_at','<=' ,$currentDate)
      ->sum('total_price');



      /////last mount renvue

      $lastMoutnStartDate =Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
      $lastMoutnEndDate =Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');

      $renvueLastMount = Order::where('status','!=','cancelled')
      ->whereDate('created_at','>=',$lastMoutnStartDate)
      ->whereDate('created_at','<=' ,$lastMoutnEndDate)
      ->sum('total_price');


/////last 30 days sales

$renvueLastThirtyDaysStartDate =Carbon::now()->subDays(30)->format('Y-m-d');

$renvueLastThirtyDays = order::where('status','!=','cancelled')
->whereDate('created_at','>=',$renvueLastThirtyDaysStartDate)
->whereDate('created_at','<=' ,$currentDate)
->sum('total_price');


$lastMoutnName =Carbon::now()->subMonth()->startOfMonth()->format('M');


        return view('admin.home',
        compact('totalUser','totalAdmin',
        'totalOrder','totalRenvue',
        'renvueThisMount','renvueLastMount',
        'renvueLastThirtyDaysStartDate'
        ,'renvueLastThirtyDays'));
   }
}
