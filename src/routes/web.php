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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(\App\Http\Controllers\Web\AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
    Route::post('logout', 'logout');
});

//Route::get('/', function () {
//    return view('welcome');
//});