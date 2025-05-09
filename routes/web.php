<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProductController;

// Home page
Route::get('/', [HomePageController::class, "index"])->name('home');

// Product listings
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

// Other pages
Route::view('/about', 'info.about')->name('about');
Route::get('/news', [InfoController::class, "news"])->name('news');
Route::view('/returns', 'info.returns')->name('returns');
Route::view('/career', 'info.career')->name('career');
Route::view('/order-status', 'info.order_status')->name('order_status');
Route::post('/order-status', [InfoController::class, "get_order_status"])->name('get_order_status'); // TODO: fix
Route::view('/shipping-and-delivery', 'info.shipping_and_delivery')->name('shipping_and_delivery');
Route::view('/contact', 'info.contact')->name('contact');
Route::view('/privacy-policy', 'info.privacy_policy')->name('privacy_policy');
Route::view('/terms-of-use', 'info.terms_of_use')->name('terms_of_use');


// Admin
Route::get('/admin', [AdminController::class, "view_products"])->name('admin')->middleware(['admin']);

Route::get('/admin/products', [AdminController::class, 'view_products'])->name('admin.products')->middleware(['admin']);
Route::get('/admin/products/create', [AdminController::class, 'view_create_product'])->name('admin.products.create')->middleware(['admin']);
Route::post('/admin/products', [AdminController::class, 'create_product'])->name('admin.products.store')->middleware(['admin']);
Route::get('/admin/products/{id}/edit', [AdminController::class, 'view_edit_product'])->name('admin.products.edit')->middleware(['admin']);
Route::put('/admin/products/{id}', [AdminController::class, 'edit_product'])->name('admin.products.update')->middleware(['admin']);
Route::delete('/admin/products/{id}', [AdminController::class, 'delete_product'])->name('admin.products.delete')->middleware(['admin']);


Route::get('/admin/brands', [AdminController::class, "view_brands"])->name('admin.brands')->middleware(['admin']);
Route::get('/admin/brands/create', [AdminController::class, "view_create_brand"])->name('admin.brands.create')->middleware(['admin']);
Route::post('/admin/brands/create', [AdminController::class, "create_brand"])->name('admin.brands.store')->middleware(['admin']);
Route::delete('/admin/brands/{id}', [AdminController::class, "delete_brand"])->name('admin.brands.delete')->middleware(['admin']);
Route::get('/admin/brands/{id}', [AdminController::class, "view_edit_brand"])->name('admin.brands.edit')->middleware(['admin']);
Route::put('/admin/brands/{id}', [AdminController::class, "edit_brand"])->name('admin.brands.edit')->middleware(['admin']);


Route::get('/admin/categories', [AdminController::class, "view_categories"])->name('admin.categories')->middleware(['admin']);
Route::get('/admin/categories/create', [AdminController::class, "view_create_category"])->name('admin.categories.create')->middleware(['admin']);
Route::post('/admin/categories/create', [AdminController::class, "create_category"])->name('admin.categories.store')->middleware(['admin']);
Route::delete('/admin/categories/{id}', [AdminController::class, "delete_category"])->name('admin.categories.delete')->middleware(['admin']);
Route::get('/admin/categories/{id}', [AdminController::class, "view_edit_category"])->name('admin.categories.edit')->middleware(['admin']);
Route::put('/admin/categories/{id}', [AdminController::class, "edit_category"])->name('admin.categories.edit')->middleware(['admin']);

Route::get('/admin/sizes', [AdminController::class, 'view_sizes'])->name('admin.sizes')->middleware(['admin']);
Route::get('/admin/sizes/create', [AdminController::class, 'view_create_size'])->name('admin.sizes.create')->middleware(['admin']);
Route::post('/admin/sizes', [AdminController::class, 'create_size'])->name('admin.sizes.store')->middleware(['admin']);
Route::get('/admin/sizes/{id}/edit', [AdminController::class, 'view_edit_size'])->name('admin.sizes.edit')->middleware(['admin']);
Route::put('/admin/sizes/{id}', [AdminController::class, 'edit_size'])->name('admin.sizes.update')->middleware(['admin']);
Route::delete('/admin/sizes/{id}', [AdminController::class, 'delete_size'])->name('admin.sizes.destroy')->middleware(['admin']);

Route::get('/admin/colors', [AdminController::class, 'view_colors'])->name('admin.colors')->middleware(['admin']);
Route::get('/admin/colors/create', [AdminController::class, 'view_create_color'])->name('admin.colors.create')->middleware(['admin']);
Route::post('/admin/colors', [AdminController::class, 'create_color'])->name('admin.colors.store')->middleware(['admin']);
Route::get('/admin/colors/{id}/edit', [AdminController::class, 'view_edit_color'])->name('admin.colors.edit')->middleware(['admin']);
Route::put('/admin/colors/{id}', [AdminController::class, 'edit_color'])->name('admin.colors.update')->middleware(['admin']);
Route::delete('/admin/colors/{id}', [AdminController::class, 'delete_color'])->name('admin.colors.destroy')->middleware(['admin']);

Route::get('/admin/collections', [AdminController::class, 'view_collections'])->name('admin.collections')->middleware(['admin']);
Route::get('/admin/collections/create', [AdminController::class, 'view_create_collection'])->name('admin.collections.create')->middleware(['admin']);
Route::post('/admin/collections', [AdminController::class, 'create_collection'])->name('admin.collections.store')->middleware(['admin']);
Route::get('/admin/collections/{id}/edit', [AdminController::class, 'view_edit_collection'])->name('admin.collections.edit')->middleware(['admin']);
Route::put('/admin/collections/{id}', [AdminController::class, 'edit_collection'])->name('admin.collections.update')->middleware(['admin']);
Route::delete('/admin/collections/{id}', [AdminController::class, 'delete_collection'])->name('admin.collections.destroy')->middleware(['admin']);
