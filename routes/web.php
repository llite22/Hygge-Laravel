<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminCategoryImagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFeedbacksController;
use App\Http\Controllers\AdminOrdersController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminSlidersController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/feedbacks', [AdminFeedbacksController::class, 'index'])->name('admin.feedbacks');
Route::post('/admin/feedbacks', [AdminFeedbacksController::class, 'store'])->name('admin-feedbacks.store');



Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
Route::get('/admin/products', [AdminProductsController::class, 'index'])->name('admin.products');
Route::get('/admin/orders', [AdminOrdersController::class, 'index'])->name('admin.orders');

Route::get('/admin/sliders', [AdminSlidersController::class, 'index'])->name('admin.sliders');
Route::get('/admin/sliders/{table}', [AdminSlidersController::class, 'create'])->name('admin-sliders.create');
Route::post('/admin/sliders', [AdminSlidersController::class, 'store'])->name('admin-sliders.store');
Route::get('/admin/sliders/{table}/edit/{id}', [AdminSlidersController::class, 'edit'])->name('admin-sliders.edit');
Route::patch('/admin/sliders/{table}/{id}', [AdminSlidersController::class, 'update'])->name('admin-sliders.update');
Route::delete('/admin/sliders/{table}/{id}', [AdminSlidersController::class, 'destroy'])->name('admin-sliders.destroy');


Route::get('/admin/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/{table}', [AdminCategoriesController::class, 'create'])->name('admin-categories.create');
Route::post('/admin/categories', [AdminCategoriesController::class, 'store'])->name('admin-categories.store');
Route::get('/admin/categories/{table}/edit/{id}', [AdminCategoriesController::class, 'edit'])->name('admin-categories.edit');
Route::patch('/admin/categories/{table}/{id}', [AdminCategoriesController::class, 'update'])->name('admin-categories.update');
Route::delete('/admin/categories/{table}/{id}', [AdminCategoriesController::class, 'destroy'])->name('admin-categories.destroy');




Route::get('/admin/category-images', [AdminCategoryImagesController::class, 'index'])->name('admin.category-images');
Route::get('/admin/category-images/{table}', [AdminCategoryImagesController::class, 'create'])->name('admin-category-images.create');
Route::post('/admin/category-images', [AdminCategoryImagesController::class, 'store'])->name('admin-category-images.store');
Route::get('/admin/category-images/{table}/edit/{id}', [AdminCategoryImagesController::class, 'edit'])->name('admin-category-images.edit');
Route::patch('/admin/category-images/{table}/{id}', [AdminCategoryImagesController::class, 'update'])->name('admin-category-images.update');
Route::delete('/admin/category-images/{table}/{id}', [AdminCategoryImagesController::class, 'destroy'])->name('admin-category-images.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
