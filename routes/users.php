<?php

use App\Http\Controllers\Users\DashobardController;
use App\Http\Controllers\Users\UsersAuthController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware'=> 'usercheckauth'], function(){
       Route::get('dashboard', [DashobardController::class, 'index'])->name('userdashboard.index');
    });
    Route::get('login', [UsersAuthController::class , 'showloginform'])->name('user.showloginform');
    Route::post('login', [UsersAuthController::class , 'login'])->name('user.login');
    Route::post('logout', [UsersAuthController::class , 'logout'])->name('user.logout');
});
