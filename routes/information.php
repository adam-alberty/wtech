<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;

Route::get('/about', [InfoController::class, "about"])->name('about');

Route::get('/news', [InfoController::class, "news"])->name('news');

Route::get('/returns', [InfoController::class, "returns"])->name('returns');

Route::get('/career', [InfoController::class, "career"])->name('career');

Route::get('/shipping-and-delivery', [InfoController::class, "shipping_and_delivery"])->name('shipping_and_delivery');

Route::get('/contact', [InfoController::class, "contact"])->name('contact');

Route::get('/privacy-policy', [InfoController::class, "privacy_policy"])->name('privacy_policy');

Route::get('/terms-of-use', [InfoController::class, "terms_of_use"])->name('terms_of_use');
