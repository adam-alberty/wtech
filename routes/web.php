<?php

require base_path('routes/information.php');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [HomePageController::class, "index"])->name('home');
Route::get('/product/{id}', [ProductController::class, "index"])->name('product');
Route::get('/checkout', [CheckoutController::class, "index"])->name('checkout');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
