<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');

Route::controller(\App\Http\Controllers\Web\AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
});

Route::controller(\App\Http\Controllers\Web\ProductController::class)->group(function () {
    Route::get('product/create', 'create')->name('product.create');
    Route::get('product/{product_id}/edit', 'edit')->name('product.edit');
    Route::put('product/{product_id}', 'update')->name('product.update');
    Route::delete('product/{product_id}', 'destroy')->name('product.destroy');
    Route::get('products', 'index')->name('product.index');
    Route::get('product/{product_id}', 'show')->name('product.show');
    Route::post('product', 'store')->name('product.store');
});

Route::controller(\App\Http\Controllers\Web\CartController::class)->group(function () {
    Route::get('carts', 'index')->name('cart.index');
    Route::get('cart/{product_id}/add', 'add')->name('cart.add');
    Route::get('cart/{dt__product__id}/remove', 'remove')->name('cart.remove');
});

Route::controller(\App\Http\Controllers\Web\OrderController::class)->group(function () {
    Route::get('orders', 'index')->name('order.index');
    Route::get('order/{user_id}/add', 'add')->name('order.add');
    Route::get('order/{order_id}/choose', 'choose')->name('order.choose');
//    Route::get('cart/{dt__product__id}/remove', 'remove')->name('cart.remove');
});
