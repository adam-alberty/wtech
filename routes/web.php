<?php

require base_path('routes/information.php');

use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;

Route::get('/', [HomePageController::class, "index"])->name('home');
Route::get('/product/{slug}', [ProductController::class, "single"])->name('product');
Route::get('/collections/{slug?}', [CollectionController::class, 'collection'])->name('collection');
Route::get('/checkout', [CheckoutController::class, "index"])->name('checkout');

// Auth
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// TODO: add "All products" to header
// TODO: search
// TODO: fix buttons product card
// TODO: cart
// TODO: redis for caching header
// TODO: add About page
// TODO: News page
// TODO: Career page
