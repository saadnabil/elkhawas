<?php

use App\Http\Controllers\Admins\AdminContactUsController;
use App\Http\Controllers\Admins\AdminsAuthController;
use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\Admins\DashobardController;
use App\Http\Controllers\Admins\ExcelImportController;
use App\Http\Controllers\Admins\ItemsController;
use App\Http\Controllers\Admins\ItemTaxesController;
use App\Http\Controllers\Admins\ItemTypesController;
use App\Http\Controllers\Admins\MessageInquiresController;
use App\Http\Controllers\Admins\orderController;
use App\Http\Controllers\Admins\OrdersController;
use App\Http\Controllers\Admins\RolesController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Users\UserContactUsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard'], function(){

    Route::group(['middleware'=> ['auth:admin', 'admincheckstatus']], function(){

       Route::get('/', [DashobardController::class, 'index'])->name('admin.dashboard.index');

       Route::resource('admins', AdminsController::class)->except('show');

       Route::resource('itemtypes', ItemTypesController::class)->except('show');

       Route::resource('itemtaxes', ItemTaxesController::class)->except('show');

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
        route::resource('users', UserController::class)->names([
            'index' => 'users.index',
            'create' => 'users.create',
            'edit' => 'users.edit',
            'store' => 'users.store',
            'update' => 'users.update',
            'destroy' => 'users.destroy',
        ]);

        /// import user
        Route::post('users/import',  [UserController::class, 'ImportUser'])->name('AdminUser.ImportUser');

        ////export item
        Route::get('item/export', [ItemsController::class, 'ExportItems'])->name('item.ExportItems');

        ///inctive Admin
        Route::get('admin/inactive', [UserController::class, 'inactive'])->name('admin.inactive');

        ///// Inquery Message
        Route::get('indexMessage/{user_id}/{message_id}', [MessageInquiresController::class, 'indexMessage'])->name('admin.indexMessage');
        Route::get('messages', [MessageInquiresController::class, 'NavbarMessage'])->name('admin.NavbarMessage');
        Route::delete('messages/delete-all-read-messages', [MessageInquiresController::class, 'deleteAllReadMessages'])->name('admin.deleteAllReadMessages');
        Route::post('messages/repley/{userId}', [MessageInquiresController::class, 'RepleyMessageToUser'])->name('admin.RepleyMessageToUser');

        



       


         ///////Contact Us routes
         Route::put('ContactUs/update', [AdminContactUsController::class, 'update'])->name('ContactUs.update');


         
        ///////Contact Us routes
        Route::get('ContactUs', [AdminContactUsController::class, 'index'])->name('ContactUs.index');
        Route::post('ContactUs/store', [AdminContactUsController::class, 'store'])->name('ContactUs.store');
        Route::get('ContactUs/edit/{id}', [AdminContactUsController::class, 'edit'])->name('ContactUs.edit');
        Route::put('ContactUs/update}', [AdminContactUsController::class, 'update'])->name('ContactUs.update');
        Route::delete('ContactUs/delete/{id}', [AdminContactUsController::class, 'destroy'])->name('ContactUs.destroy');
        Route::post('items/upload-excel',  [ExcelImportController::class, 'import'])->name('admins.itemsexcelimport');

    });


    Route::get('login', [AdminsAuthController::class, 'showloginform'])->name('admin.showloginform');
    Route::post('login', [AdminsAuthController::class, 'login'])->name('admin.login');
    Route::post('logout', [AdminsAuthController::class, 'logout'])->name('admin.logout');
     //forgot pasword design
     Route::get('forgotpassword', [UserController::class, 'forgotpassword'])->name('admin.forgotpassword');

});
