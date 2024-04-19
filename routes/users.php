<?php

use App\Http\Controllers\Users\CartsController;
use App\Http\Controllers\Users\ItemsController;
use App\Http\Controllers\Users\OrdersController;
use App\Http\Controllers\Users\UserContactUsController;
use App\Http\Controllers\Users\UsersAuthController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware'=> ['usercheckauth']], function(){
       Route::get('items' , [ItemsController::class, 'index'])->name('user.items.index');
<<<<<<< HEAD
       Route::get('items/thankyou' , [ItemsController::class, 'thankyou'])->name('user.thankyou');

=======
       route::post('carts/add', [CartsController::class, 'add'])->name('carts.add');
       route::get('carts/plus/{id}', [CartsController::class, 'plus'])->name('carts.plus');
       route::get('carts/minus/{id}', [CartsController::class, 'minus'])->name('carts.minus');
       route::get('carts/remove.{id}', [CartsController::class, 'remove'])->name('carts.remove');
       route::get('carts/details', [CartsController::class, 'cartsdetails'])->name('carts.details');
       route::get('carts/checkout', [CartsController::class, 'checkoutform'])->name('carts.checkoutform');
       route::post('carts/checkout', [CartsController::class, 'checkout'])->name('carts.checkout');
       route::resource('orders', OrdersController::class)->names([
            'index' => 'users.orders.index',
       ]);
>>>>>>> 9876272acb407fa124ce5f7d0db82b4ee6530394
       Route::get('contactus',[UserContactUsController::class,'user'])->name('userContactus.index');

    });
    Route::get('login', [UsersAuthController::class , 'showloginform'])->name('user.showloginform');
    Route::post('login', [UsersAuthController::class , 'login'])->name('user.login');
    Route::post('logout', [UsersAuthController::class , 'logout'])->name('user.logout');

    Route::get('Password', [UsersAuthController::class , 'UserShowPassword'])->name('user.UserShowPassword');
    Route::post('password/change', [UsersAuthController::class , 'UserChangePassword'])->name('user.UserChangePassword');


    Route::get('inactive', [UsersAuthController::class , 'designInactivePage'])->name('user.designInactivePage');

    

});

