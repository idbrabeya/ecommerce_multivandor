<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('frontend.index');
// });

Auth::routes();


Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/product/details/{slug}',[FrontendController::class,'product_details'])->name('product.details');
Route::get('/category/{category_id}',[FrontendController::class,'categorywiseproducts'])->name('categorywise.products');


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/email/offer',[HomeController::class,'email_offer'])->name('email.offer');
Route::get('/single/email/offer/{id}',[HomeController::class,'single_email_offer'])->name('single.email.offer');
Route::post('/check/email/offer/',[HomeController::class,'check_email_offer'])->name('check.email.offer');

// profile
Route::get('/admin/profile',[ProfileController::class,'profile'])->name('profile');
Route::post('/admin/profile/namechange',[ProfileController::class,'namechange'])->name('profile.namechange');
Route::post('/admin/profile/passwordchange',[ProfileController::class,'passwordchange'])->name('profile.passwordchange');
Route::post('/admin/profile/photochange',[ProfileController::class,'photochange'])->name('profile.photochange');


// categroy ,vendor,product, coupon
Route::resource('category',CategoryController::class);
Route::resource('vendor',VendorController::class);
Route::resource('product',ProductController::class);
Route::resource('wishlist',WishlistController::class);
Route::resource('coupon',CouponController::class);

Route::get('wishlist/insert/{product_id}',[WishlistController::class,'wishlist_insert'])->name('wishlist.insert');
Route::get('wishlist/remove/{wishlist_id}',[WishlistController::class,'wishlist_remove'])->name('wishlist.remove');
Route::get('add/tocart/wishlist/{wishlist_id}',[CartController::class,'cart_wishlist'])->name('cart.wishlist');

// add to cart
Route::POST('add/tocart/{product_id}',[CartController::class,'add_cart'])->name('add.cart');
Route::get('/cart',[CartController::class,'cart'])->name('cart');

Route::get('/clear/shop/cart/{user_id}',[CartController::class,'clear_shop_cart'])->name('clear.shop.cart');
Route::get('/cart/remove/{cart_id}',[CartController::class,'cart_remove'])->name('cart.remove');
Route::POST('/cart/update',[CartController::class,'cart_update'])->name('cart.update');
