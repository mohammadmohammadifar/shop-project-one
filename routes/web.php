<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('/admin-panel')->name('admin. ')->group(function(){
//     Route::resource('brand', BrandController::class);
// });
