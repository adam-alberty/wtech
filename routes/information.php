<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;

Route::view('/about', 'info.about')->name('about');

Route::get('/news', [InfoController::class, "news"])->name('news');

Route::view('/returns', 'info.returns')->name('returns');

Route::view('/career', 'info.career')->name('career');

Route::view('/order-status', 'info.order_status')->name('order_status');

Route::post('/order-status', [InfoController::class, "get_order_status"])->name('get_order_status');

Route::view('/shipping-and-delivery', 'info.shipping_and_delivery')->name('shipping_and_delivery');

Route::view('/contact', 'info.contact')->name('contact');

Route::view('/privacy-policy', 'info.privacy_policy')->name('privacy_policy');

Route::view('/terms-of-use', 'info.terms_of_use')->name('terms_of_use');
