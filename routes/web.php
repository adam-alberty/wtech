<?php

require base_path('routes/information.php');

use App\Http\Controllers\CartController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomePageController::class, "index"])->name('home');
Route::get('/product/{slug}', [ProductController::class, "single"])->name('product');
Route::post('/product/{slug}/add-to-cart', [ProductController::class, 'addToCart'])->name('product.addToCart');
Route::get('/collections/{slug?}', [CollectionController::class, 'collection'])->name('collection');


// Cart: step 1
Route::get('/checkout', [CartController::class, 'index'])->name('checkout');
Route::post('/checkout/update', [CartController::class, 'update'])->name('cart.update');

// Cart: step 2
Route::get('/checkout/delivery', [DeliveryController::class, 'index'])->name('delivery');
Route::post('/checkout/delivery/save', [DeliveryController::class, 'save'])->name('delivery.save');

// Cart: step 3
Route::get('/checkout/payment', [PaymentController::class, 'index'])->name('payment');

// Cart: step 4
Route::post('/checkout/order/save', [OrderController::class, 'save'])->name('order.save');
Route::get('/checkout/order/{order}', [OrderController::class, 'success'])->name('order.success');

// Auth
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// TODO: redis for caching header
// TODO: add News page
// TODO: Clickable items in cart
// TODO: secure /checkout/order/
