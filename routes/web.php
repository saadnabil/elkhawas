<?php

use Illuminate\Support\Facades\Route;

Route::get('/auth', function () {
    return view('auth.login');
});

Route::get('/layout', function () {
    return view('layout.content');
});


Route::get('/admin/home', function () {
    return view('admin.layout.content');
});


Route::get('/admin/product/index', function () {
    return view('admin.products.index');
});


Route::get('/admin/product/add', function () {
    return view('admin.products.create-product');
});


Route::get('/admin/product/edit', function () {
    return view('admin.products.edit-products');
});



Route::get('/order', function () {
    return view('admin.orders.orders');
});

Route::get('/ordersdetails', function () {
    return view('admin.orders.order-details');
});

Route::get('/trackdetails', function () {
    return view('admin.orders.track-orders-details');
});

Route::get('/showtracking', function () {
    return view('admin.orders.show-track-change-orders');
});

Route::get('/admin/users', function () {
    return view('admin.users.index');
});

Route::get('/admin/users/add', function () {
    return view('admin.users.create-user');
});


Route::get('/admin/users/edit', function () {
    return view('admin.users.edit-user');
});

Route::get('profile/', function () {
    return view('admin.settings.profile');
});

Route::get('/contactUs', function () {
    return view('admin.settings.contactUs');
});






Route::get('/users/home', function () {
    return view('users.products.index');
});

Route::get('/users/home2', function () {
    return view('users.products.index2');
});

Route::get('/cart', function () {
    return view('users.cart.viewCart');
});

Route::get('/orders', function () {
    return view('users.orders.showOrders');
});
Route::get('/orders/details', function () {
    return view('users.orders.orderDetails');
});

Route::get('/orders/wishlist', function () {
    return view('users.orders.wishlist');
});


Route::get('/setttings', function () {
    return view('users.settings.settings');
});

Route::get('/settings/contactus', function () {
    return view('users.settings.contactus');
});





