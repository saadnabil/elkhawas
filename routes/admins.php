<?php

use App\Http\Controllers\Admins\AdminContactUsController;
use App\Http\Controllers\Admins\AdminsAuthController;
use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\Admins\DashobardController;
use App\Http\Controllers\Admins\ExcelImportController;
use App\Http\Controllers\Admins\ItemsController;
use App\Http\Controllers\Admins\OrdersController;
use App\Http\Controllers\Admins\RolesController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Users\UserContactUsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard'], function(){
    Route::group(['middleware'=> ['admincheckauth']], function(){

       Route::get('/', [DashobardController::class, 'index'])->name('admin.dashboard.index');

       Route::resource('admins', AdminsController::class);

       Route::resource('items' , ItemsController::class)->names([
            'index' => 'admin.items.index',
            'create' => 'admin.items.create',
            'edit' => 'admin.items.edit',
            'update' => 'admin.items.update',
            'store' => 'admin.items.store',
            'destroy' => 'admin.items.destroy',
        ]);

        Route::resource('roles', RolesController::class);

        Route::post('orders/sendinvoice', [OrdersController::class, 'sendInvoice'])->name('admin.orders.sendinvoice');
        Route::post('orders/update/status', [OrdersController::class, 'updateStatus'])->name('admin.orders.updatestatus');
        Route::get('orders/track-order/details/{order}', [OrdersController::class, 'trackorderdetails'])->name('admin.orders.trackorderdetails');

        Route::resource('orders', OrdersController::class)->only('index','show')->names([
            'index' => 'admin.orders.index',
            'show' => 'admin.orders.show'
        ]);

        ///////User routes
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');



         ///////Contact Us routes
         Route::get('ContactUs', [AdminContactUsController::class, 'index'])->name('ContactUs.index');
         Route::post('ContactUs/store', [AdminContactUsController::class, 'store'])->name('ContactUs.store');
         Route::get('ContactUs/edit/{id}', [AdminContactUsController::class, 'edit'])->name('ContactUs.edit');
         Route::put('ContactUs/update/{id}', [AdminContactUsController::class, 'update'])->name('ContactUs.update');
         Route::delete('ContactUs/delete/{id}', [AdminContactUsController::class, 'destroy'])->name('ContactUs.destroy');
        Route::post('items/upload-excel',  [ExcelImportController::class, 'import'])->name('admins.itemsexcelimport');
    });
    Route::get('login', [AdminsAuthController::class, 'showloginform'])->name('admin.showloginform');
    Route::post('login', [AdminsAuthController::class, 'login'])->name('admin.login');
    Route::post('logout', [AdminsAuthController::class, 'logout'])->name('admin.logout');
});
