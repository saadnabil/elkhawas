<?php

use App\Http\Controllers\Admins\MessageInquiresController;
use App\Http\Controllers\Users\CartsController;
use App\Http\Controllers\Users\changeProfileImage;
use App\Http\Controllers\Users\ItemsController;
use App\Http\Controllers\Users\OrdersController;
use App\Http\Controllers\Users\UserContactUsController;
use App\Http\Controllers\Users\UserMessageController;
use App\Http\Controllers\Users\UsersAuthController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware'=> ['usercheckauth']], function(){
       Route::get('items' , [ItemsController::class, 'index'])->name('user.items.index');
       route::post('carts/add', [CartsController::class, 'add'])->name('carts.add');
       route::get('carts/plus/{id}', [CartsController::class, 'plus'])->name('carts.plus');
       route::get('carts/minus/{id}', [CartsController::class, 'minus'])->name('carts.minus');
       route::get('carts/remove.{id}', [CartsController::class, 'remove'])->name('carts.remove');
       route::get('carts/details', [CartsController::class, 'cartsdetails'])->name('carts.details');
       route::get('carts/checkout', [CartsController::class, 'checkoutform'])->name('carts.checkoutform');
       route::post('carts/checkout', [CartsController::class, 'checkout'])->name('carts.checkout');
       route::get('carts/thankyou', [CartsController::class, 'thankyou'])->name('carts.thankyou');

       /// inactive design 
       route::get('user/inactive', [CartsController::class, 'inactiveAccount'])->name('user.inactiveAccount');

          ///// Inquery Message 
          Route::get('indexMessage/{admin_id}/{message_id}', [UserMessageController::class, 'indexMessageUser'])->name('user.indexMessageUser');
          Route::delete('messages/delete-all-read-messages', [UserMessageController::class, 'deleteAllReadMessages'])->name('user.deleteAllReadMessages');

      //     Route::post('storMessage', [UserMessageController::class, 'storMessage'])->name('user.storMessage');
      //   Route::get('messages', [UserMessageController::class, 'NavbarMessage'])->name('user.NavbarMessage');



 //////User change image 
 route::get('user/showProfileImage', [changeProfileImage::class, 'showProfileImage'])->name('user.showProfileImage');

 route::post('profileImage', [changeProfileImage::class, 'UserChangeImage'])->name('user.UserChangeImage');


       route::resource('orders', OrdersController::class)->names([
            'index' => 'users.orders.index',
       ]);


       Route::get('contactus',[UserContactUsController::class,'user'])->name('userContactus.index');
       Route::post('Inquiry/store',[UserContactUsController::class,'store'])->name('userInquiry.store');


    });
    Route::get('login', [UsersAuthController::class , 'showloginform'])->name('user.showloginform');
    Route::post('login', [UsersAuthController::class , 'login'])->name('user.login');
    Route::post('logout', [UsersAuthController::class , 'logout'])->name('user.logout');

    Route::get('Password', [UsersAuthController::class , 'UserShowPassword'])->name('user.UserShowPassword');
    Route::post('password/change', [UsersAuthController::class , 'UserChangePassword'])->name('user.UserChangePassword');



});

