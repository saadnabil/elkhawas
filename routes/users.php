<?php
use App\Http\Controllers\Users\AddressesController;
use App\Http\Controllers\Users\CartsController;
use App\Http\Controllers\Users\changeProfileImage;
use App\Http\Controllers\Users\ChatController;
use App\Http\Controllers\Users\CouponsController;
use App\Http\Controllers\Users\ItemsController;
use App\Http\Controllers\Users\OrdersController;
use App\Http\Controllers\Users\UserContactUsController;
use App\Http\Controllers\Users\UserMessageController;
use App\Http\Controllers\Users\UsersAuthController;
use App\Http\Controllers\Users\WishlistController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware'=> ['usercheckauth']], function(){
       //items
       Route::get('items' , [ItemsController::class, 'index'])->name('user.items.index');

       //cart operations
       route::post('carts/add', [CartsController::class, 'add'])->name('carts.add');
       route::post('carts/applycoupon', [CartsController::class, 'applycoupon'])->name('carts.applycoupon');
       route::get('carts/disapplycoupon', [CartsController::class, 'disapplycoupon'])->name('carts.disapplycoupon');
       route::get('carts/plus/{id}', [CartsController::class, 'plus'])->name('carts.plus');
       route::get('carts/minus/{id}', [CartsController::class, 'minus'])->name('carts.minus');
       route::get('carts/remove/{id}', [CartsController::class, 'remove'])->name('carts.remove');
       route::get('carts/details', [CartsController::class, 'cartsdetails'])->name('carts.details');
       route::get('carts/checkout', [CartsController::class, 'checkoutform'])->name('carts.checkoutform');
       route::post('carts/checkout', [CartsController::class, 'checkout'])->name('carts.checkout');
       route::get('carts/thankyou', [CartsController::class, 'thankyou'])->name('carts.thankyou');

       Route::get('support', [ChatController::class, 'chatform'])->name('user.support');
       Route::post('support/openticket', [ChatController::class,'openticket'])->name('user.support.openticket');
       Route::post('support/sendMessage/{ticket}', [ChatController::class, 'sendMessage'])->name('user.support.sendMessage');

       /// inactive design
       route::get('user/inactive', [CartsController::class, 'inactiveAccount'])->name('user.inactiveAccount');

        ///// Inquery Message
        Route::get('indexMessage/{admin_id}/{message_id}', [UserMessageController::class, 'indexMessageUser'])->name('user.indexMessageUser');
        Route::delete('messages/delete-all-read-messages', [UserMessageController::class, 'deleteAllReadMessages'])->name('user.deleteAllReadMessages');

        //////User change image
        route::get('user/showProfileImage', [changeProfileImage::class, 'showProfileImage'])->name('user.showProfileImage');
        route::post('profileImage', [changeProfileImage::class, 'UserChangeImage'])->name('user.UserChangeImage');

       route::resource('orders', OrdersController::class)->names([
            'index' => 'users.orders.index',
       ]);

       Route::get('contactus',[UserContactUsController::class,'user'])->name('userContactus.index');
       Route::post('Inquiry/store',[UserContactUsController::class,'store'])->name('userInquiry.store');

       Route::post('orders/{order}/cancel',[OrdersController::class, 'cancel'])->name('user.orders.cancel');
       route::post('orders/checkout', [OrdersController::class, 'checkout'])->name('user.orders.checkout');
       route::get('orders', [OrdersController::class, 'index'])->name('user.orders.index');
       route::get('orders/{order}', [OrdersController::class, 'show'])->name('user.orders.show');
       Route::get('wishlist/favourite/{item}',[WishlistController::class, 'favourite'])->name('wishlist.favourite');
       Route::resource('wishlist', WishlistController::class)->only('index','destroy');
       Route::resource('coupons', CouponsController::class)->only('index');
       Route::resource('adddress', AddressesController::class)->only('store','destroy')->names([
            'store' => 'user.addresses.store',
            'destroy' => 'user.addresses.destroy'
       ]);
       Route::get('contactus',[UserContactUsController::class,'user'])->name('userContactus.index');
    });
    Route::get('login', [UsersAuthController::class , 'showloginform'])->name('user.showloginform');
    Route::post('login', [UsersAuthController::class , 'login'])->name('user.login');
    Route::post('logout', [UsersAuthController::class , 'logout'])->name('user.logout');
    Route::get('account/deactivated', [UsersAuthController::class , 'deactivatedAccount'])->name('user.deacivatedAccount');
    Route::get('Password', [UsersAuthController::class , 'UserShowPassword'])->name('user.UserShowPassword');
    Route::post('password/change', [UsersAuthController::class , 'UserChangePassword'])->name('user.UserChangePassword');
});
