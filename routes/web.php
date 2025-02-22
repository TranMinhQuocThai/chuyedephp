<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sanpham', [App\Http\Controllers\HomeController::class, 'sanpham'])->name('home');
Route::get('/gioithieu', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/donhang', [App\Http\Controllers\HomeController::class, 'donhang'])->name('home');

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

Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('orders.store');
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Xóa đơn hàng
Route::get('/order/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit'); // Hiển thị form sửa đơn hàng
Route::put('/order/{id}', [OrderController::class, 'update'])->name('orders.update'); // Cập nhật thông tin đơn hàng
Route::put('/orders/{id}/mark-delivered', [OrderController::class, 'markDelivered'])->name('orders.markDelivered');
Route::delete('/ordersadmin/{id}', [OrderController::class, 'adminDestroy'])->name('ordersadmin.destroy'); // Xóa đơn hàng
Route::get('/orders/{id}/details', [OrderController::class, 'getOrderDetails']);

