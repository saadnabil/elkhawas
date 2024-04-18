<?php

use App\Http\Controllers\Users\CartsController;
use App\Http\Controllers\Users\ItemsController;
use App\Http\Controllers\Users\UsersAuthController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware'=> 'usercheckauth'], function(){
       Route::get('items' , [ItemsController::class, 'index'])->name('user.items.index');
       route::post('carts/add', [CartsController::class, 'add'])->name('carts.add');
       route::get('carts/plus/{id}', [CartsController::class, 'plus'])->name('carts.plus');
       route::get('carts/minus/{id}', [CartsController::class, 'minus'])->name('carts.minus');
       route::get('carts/remove.{id}', [CartsController::class, 'remove'])->name('carts.remove');
    });
    Route::get('login', [UsersAuthController::class , 'showloginform'])->name('user.showloginform');
    Route::post('login', [UsersAuthController::class , 'login'])->name('user.login');
    Route::post('logout', [UsersAuthController::class , 'logout'])->name('user.logout');
});
