<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products/create', [ProductController::class, 'store']);
Route::get('/products/{product}', [ProductController::class, 'show']);
