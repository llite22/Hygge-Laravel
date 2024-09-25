<?php

use App\Http\Controllers\AdminCategoryProductsController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/admin/category-products', [AdminCategoryProductsController::class, 'store'])->withoutMiddleware([AdminMiddleware::class]);
