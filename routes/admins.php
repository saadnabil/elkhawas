<?php

use App\Http\Controllers\Admins\AdminsAuthController;
use App\Http\Controllers\Admins\DashobardController;
use App\Http\Controllers\Admins\ExcelImportController;
use App\Http\Controllers\Admins\ItemsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware'=> ['admincheckauth']], function(){
       Route::get('dashboard', [DashobardController::class, 'index'])->name('admin.dashboard.index');
       Route::resource('items' , ItemsController::class)->names([
            'index' => 'admin.items.index',
            'create' => 'admin.items.create',
            'edit' => 'admin.items.edit',
            'update' => 'admin.items.update',
            'store' => 'admin.items.store',
            'destroy' => 'admin.items.destroy',
       ]);
       Route::post('items/upload-excel',  [ExcelImportController::class , 'import'])->name('admins.itemsexcelimport');
    });
    Route::get('login', [AdminsAuthController::class , 'showloginform'])->name('admin.showloginform');
    Route::post('login', [AdminsAuthController::class , 'login'])->name('admin.login');
    Route::post('logout', [AdminsAuthController::class , 'logout'])->name('admin.logout');
});
