<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('products.index');
});

use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
