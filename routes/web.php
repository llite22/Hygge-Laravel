<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminCategoryImagesController;
use App\Http\Controllers\AdminCategoryProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFeedbacksController;
use App\Http\Controllers\AdminOrdersController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminSlidersController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index');

// Для оставления обратной связи
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


// Продукты для добавления в корзину
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Корзина
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');;
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::patch('/cart/update/{cartItemId}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');;


// Страница админ
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware(AdminMiddleware::class);;

// Админ обратная связь
Route::get('/admin/feedbacks', [AdminFeedbacksController::class, 'index'])->name('admin.feedbacks')->middleware(AdminMiddleware::class);;
Route::post('/admin/feedbacks', [AdminFeedbacksController::class, 'store'])->name('admin-feedbacks.store')->middleware(AdminMiddleware::class);;

// Админ Пользователи
Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users')->middleware(AdminMiddleware::class);;
Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users')->middleware(AdminMiddleware::class);;
Route::get('/admin/users/edit/{id}', [AdminUsersController::class, 'edit'])->name('admin-users.edit')->middleware(AdminMiddleware::class);;
Route::patch('/admin/users/{id}', [AdminUsersController::class, 'update'])->name('admin-users.update')->middleware(AdminMiddleware::class);;
Route::delete('/admin/users/{id}', [AdminUsersController::class, 'destroy'])->name('admin-users.destroy')->middleware(AdminMiddleware::class);;

// Админ Категории продуктов
Route::get('/admin/category-products', [AdminCategoryProductsController::class, 'index'])->name('admin.category-products')->middleware(AdminMiddleware::class);;
Route::get('/admin/category-products/create', [AdminCategoryProductsController::class, 'create'])->name('admin-category-products.create')->middleware(AdminMiddleware::class);;
Route::post('/admin/category-products', [AdminCategoryProductsController::class, 'store'])->name('admin-category-products.store')->middleware(AdminMiddleware::class);;
Route::get('/admin/category-products/edit/{id}', [AdminCategoryProductsController::class, 'edit'])->name('admin-category-products.edit')->middleware(AdminMiddleware::class);;
Route::patch('/admin/category-products/{id}', [AdminCategoryProductsController::class, 'update'])->name('admin-category-products.update')->middleware(AdminMiddleware::class);;
Route::delete('/admin/category-products/{id}', [AdminCategoryProductsController::class, 'destroy'])->name('admin-category-products.destroy')->middleware(AdminMiddleware::class);;

// Админ Продукты
Route::get('/admin/products', [AdminProductsController::class, 'index'])->name('admin.products')->middleware(AdminMiddleware::class);;
Route::get('/admin/products/create', [AdminProductsController::class, 'create'])->name('admin-products.create')->middleware(AdminMiddleware::class);;
Route::post('/admin/products', [AdminProductsController::class, 'store'])->name('admin-products.store')->middleware(AdminMiddleware::class);;
Route::get('/admin/products/edit/{id}', [AdminProductsController::class, 'edit'])->name('admin-products.edit')->middleware(AdminMiddleware::class);;
Route::patch('/admin/products/{id}', [AdminProductsController::class, 'update'])->name('admin-products.update')->middleware(AdminMiddleware::class);;
Route::delete('/admin/products/{id}', [AdminProductsController::class, 'destroy'])->name('admin-products.destroy')->middleware(AdminMiddleware::class);;

// Админ Заказы
Route::get('/admin/orders', [AdminOrdersController::class, 'index'])->name('admin.orders')->middleware(AdminMiddleware::class);;

// Админ Слайдеры
Route::get('/admin/sliders', [AdminSlidersController::class, 'index'])->name('admin.sliders')->middleware(AdminMiddleware::class);;
Route::get('/admin/sliders/{table}', [AdminSlidersController::class, 'create'])->name('admin-sliders.create')->middleware(AdminMiddleware::class);;
Route::post('/admin/sliders', [AdminSlidersController::class, 'store'])->name('admin-sliders.store')->middleware(AdminMiddleware::class);;
Route::get('/admin/sliders/{table}/edit/{id}', [AdminSlidersController::class, 'edit'])->name('admin-sliders.edit')->middleware(AdminMiddleware::class);;
Route::patch('/admin/sliders/{table}/{id}', [AdminSlidersController::class, 'update'])->name('admin-sliders.update')->middleware(AdminMiddleware::class);;
Route::delete('/admin/sliders/{table}/{id}', [AdminSlidersController::class, 'destroy'])->name('admin-sliders.destroy')->middleware(AdminMiddleware::class);;

// Админ Категории
Route::get('/admin/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories')->middleware(AdminMiddleware::class);;
Route::get('/admin/categories/{table}', [AdminCategoriesController::class, 'create'])->name('admin-categories.create')->middleware(AdminMiddleware::class);;
Route::post('/admin/categories', [AdminCategoriesController::class, 'store'])->name('admin-categories.store')->middleware(AdminMiddleware::class);;
Route::get('/admin/categories/{table}/edit/{id}', [AdminCategoriesController::class, 'edit'])->name('admin-categories.edit')->middleware(AdminMiddleware::class);;
Route::patch('/admin/categories/{table}/{id}', [AdminCategoriesController::class, 'update'])->name('admin-categories.update')->middleware(AdminMiddleware::class);;
Route::delete('/admin/categories/{table}/{id}', [AdminCategoriesController::class, 'destroy'])->name('admin-categories.destroy')->middleware(AdminMiddleware::class);;

// Админ Изображения категорий
Route::get('/admin/category-images', [AdminCategoryImagesController::class, 'index'])->name('admin.category-images')->middleware(AdminMiddleware::class);;
Route::get('/admin/category-images/{table}', [AdminCategoryImagesController::class, 'create'])->name('admin-category-images.create')->middleware(AdminMiddleware::class);;
Route::post('/admin/category-images', [AdminCategoryImagesController::class, 'store'])->name('admin-category-images.store')->middleware(AdminMiddleware::class);;
Route::get('/admin/category-images/{table}/edit/{id}', [AdminCategoryImagesController::class, 'edit'])->name('admin-category-images.edit')->middleware(AdminMiddleware::class);;
Route::patch('/admin/category-images/{table}/{id}', [AdminCategoryImagesController::class, 'update'])->name('admin-category-images.update')->middleware(AdminMiddleware::class);;
Route::delete('/admin/category-images/{table}/{id}', [AdminCategoryImagesController::class, 'destroy'])->name('admin-category-images.destroy')->middleware(AdminMiddleware::class);;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
