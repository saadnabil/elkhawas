<?php

use App\Http\Controllers\Admins\AdminsAuthController;
use App\Http\Controllers\Admins\DashobardController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware'=> ['admincheckauth']], function(){
       Route::get('dashboard', [DashobardController::class, 'index'])->name('admindashboard.index');
    });
    Route::get('login', [AdminsAuthController::class , 'showloginform'])->name('admin.showloginform');
    Route::post('login', [AdminsAuthController::class , 'login'])->name('admin.login');

    Route::post('logout', [AdminsAuthController::class , 'logout'])->name('admin.logout');
});

