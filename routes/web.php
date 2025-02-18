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
Route::get('/sanpham', [App\Http\Controllers\HomeController::class, 'sanpham'])->name('home');
Route::get('/gioithieu', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes/web.php
Route::group(['middleware' => ['web']], function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

    ;
});



//router cho cơ sở dữ liệu
Route::get('/Food', [FoodController::class, 'index'])->name('food.index');
Route::get('/Food/create', [FoodController::class, 'create'])->name('food.create');
Route::post('/Food/store', [FoodController::class, 'store'])->name('food.store');
Route::delete('/Food/{id}', [FoodController::class, 'destroy'])->name('food.destroy'); // Xóa đơn hàng
Route::get('/Food/{id}/edit', [FoodController::class, 'edit'])->name('food.edit'); // Hiển thị form sửa đơn hàng
Route::put('/Food/{id}', [FoodController::class, 'update'])->name('food.update'); // Cập nhật thông tin đơn hàng
