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
