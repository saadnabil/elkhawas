<?php

use App\Http\Controllers\LanguageController;
use App\Jobs\SendEmailJob;
use App\Mail\SendOrderEmail;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('change-lang', [LanguageController::class, 'change'])->name('changelang');


Route::get('email-test', function(){
    $order = Order::find(16);
    $order = $order->load('order_details.item','coupon');
    // return response()->json($order);
    $details['email'] = 'saadnabil00@gmail.com';
    $details['order'] = $order;
    dispatch(new SendEmailJob($details));
});

Route::get('TestOrderTrack', function () {

    return view('orderTrac');
    
});








