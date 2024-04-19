<?php

use App\Http\Controllers\Users\ItemsController;
use App\Http\Controllers\Users\UserContactUsController;
use App\Http\Controllers\Users\UsersAuthController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware'=> ['usercheckauth']], function(){
       Route::get('items' , [ItemsController::class, 'index'])->name('user.items.index');
       Route::get('items/thankyou' , [ItemsController::class, 'thankyou'])->name('user.thankyou');

       Route::get('contactus',[UserContactUsController::class,'user'])->name('userContactus.index');

    });
    Route::get('login', [UsersAuthController::class , 'showloginform'])->name('user.showloginform');
    Route::post('login', [UsersAuthController::class , 'login'])->name('user.login');
    Route::post('logout', [UsersAuthController::class , 'logout'])->name('user.logout');

    Route::get('Password', [UsersAuthController::class , 'UserShowPassword'])->name('user.UserShowPassword');
    Route::post('password/change', [UsersAuthController::class , 'UserChangePassword'])->name('user.UserChangePassword');
  

    Route::get('inactive', [UsersAuthController::class , 'designInactivePage'])->name('user.designInactivePage');

    

});

