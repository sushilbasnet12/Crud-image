<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', [ProductController::class,'index'])->name('products.index');

// Route::get('product/create', [ProductController::class,'create'])->name('products.create');

// Route::post('product/store', [ProductController::class,'store'])->name('products.store');

Route::resource('product', ProductController::class);

Route::resource('order', OrderController::class);
