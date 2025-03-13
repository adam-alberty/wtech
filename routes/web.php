<?php

require base_path('routes/information.php');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\InfoController;

Route::get('/', [HomePageController::class, "index"])->name('home');

Route::get('/product/{id}', [ProductController::class, "index"])->name('product');

Route::get('/cart', [ShoppingCartController::class, "index"])->name('cart');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
