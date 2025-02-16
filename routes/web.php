<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\FoodController;

Route::get('/foods', [FoodController::class, 'index']);
Route::get('/foods/{id}', [FoodController::class, 'show']);
Route::post('/foods', [FoodController::class, 'store']);
Route::put('/foods/{id}', [FoodController::class, 'update']);
Route::delete('/foods/{id}', [FoodController::class, 'destroy']);
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sanpham', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/gioithieu', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes/web.php
Route::group(['middleware' => ['web']], function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

