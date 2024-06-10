<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CompareController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\TagController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/admin-panel')->name('admin.')->group(function(){

    Route::resource('tags', TagController::class);
    Route::resource('attributes', AttributeController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('coupons', CouponController::class);


});


// Edit Image
Route::put('products/{product}/image-set_primary', [ProductImageController::class, 'setPrimary'])->name('products.images.set_primary');
Route::get('products/{product}/setImage', [ProductImageController::class, 'image'])->name('products.images.editImage');



// front
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/{product}/details',[HomeController::class,'details'])->name('home.details');

// compare
Route::get('/{product}/compare',[CompareController::class,'add'])->name('home.compare.add');
Route::get('/compare/index',[CompareController::class,'index'])->name('home.compare.index');
Route::get('/compare/remove/{productId}',[CompareController::class,'remove'])->name('home.compare.remove');

// cart
Route::post('/add-to-cart',[CartController::class,'add'])->name('home.add.cart');
Route::get('/cart',[CartController::class,'index'])->name('home.index.cart');
Route::put('/cart',[CartController::class,'update'])->name('home.update.cart');


// check coupon
Route::post('/check-coupon', [CouponController::class, 'checkCoupon'])->name('home.counpons.check');



Route::get('/test', function () {
    dd(Cart::content());
});
