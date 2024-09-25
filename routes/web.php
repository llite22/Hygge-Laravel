<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminCategoryImagesController;
use App\Http\Controllers\AdminCategoryProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSlidersController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Feedback\AdminFeedbacksController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Order\AdminOrdersController;
use App\Http\Controllers\Product\AdminProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AdminUsersController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main.index');

// Для оставления обратной связи
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


// Продукты для добавления в корзину
Route::get('/products', [ProductController::class, 'index'])->name('products.index');



Route::middleware([AdminMiddleware::class])->group(function () {
// Страница админ
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Админ обратная связь
    Route::get('/admin/feedbacks', [AdminFeedbacksController::class, 'index'])->name('admin.feedbacks');
    Route::post('/admin/feedbacks', [AdminFeedbacksController::class, 'store'])->name('admin-feedbacks.store');

    // Админ Пользователи
    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users');
    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/edit/{id}', [AdminUsersController::class, 'edit'])->name('admin-users.edit');
    Route::patch('/admin/users/{id}', [AdminUsersController::class, 'update'])->name('admin-users.update');
    Route::delete('/admin/users/{id}', [AdminUsersController::class, 'destroy'])->name('admin-users.destroy');

    // Админ Категории продуктов
    Route::get('/admin/category-products', [AdminCategoryProductsController::class, 'index'])->name('admin.category-products');
    Route::get('/admin/category-products/create', [AdminCategoryProductsController::class, 'create'])->name('admin-category-products.create');
//    Route::post('/admin/category-products', [AdminCategoryProductsController::class, 'store'])->name('admin-category-products.store');
    Route::get('/admin/category-products/edit/{category_product}', [AdminCategoryProductsController::class, 'edit'])->name('admin-category-products.edit');
    Route::patch('/admin/category-products/{category_product}', [AdminCategoryProductsController::class, 'update'])->name('admin-category-products.update');
    Route::delete('/admin/category-products/{category_product}', [AdminCategoryProductsController::class, 'destroy'])->name('admin-category-products.destroy');

    // Админ Продукты
    Route::get('/admin/products', [AdminProductsController::class, 'index'])->name('admin.products');
    Route::get('/admin/products/create', [AdminProductsController::class, 'create'])->name('admin-products.create');
    Route::post('/admin/products', [AdminProductsController::class, 'store'])->name('admin-products.store');
    Route::get('/admin/products/edit/{id}', [AdminProductsController::class, 'edit'])->name('admin-products.edit');
    Route::patch('/admin/products/{id}', [AdminProductsController::class, 'update'])->name('admin-products.update');
    Route::delete('/admin/products/{id}', [AdminProductsController::class, 'destroy'])->name('admin-products.destroy');

    // Админ Заказы
    Route::get('/admin/orders', [AdminOrdersController::class, 'index'])->name('admin.orders');
    Route::get('/admin/orders/edit/{id}', [AdminOrdersController::class, 'edit'])->name('admin-orders.edit');
    Route::patch('/admin/orders/{id}', [AdminOrdersController::class, 'update'])->name('admin-orders.update');
    Route::delete('/admin/orders/{id}', [AdminOrdersController::class, 'destroy'])->name('admin-orders.destroy');

    // Админ Слайдеры
    Route::get('/admin/sliders', [AdminSlidersController::class, 'index'])->name('admin.sliders');
    Route::get('/admin/sliders/{table}', [AdminSlidersController::class, 'create'])->name('admin-sliders.create');
    Route::post('/admin/sliders', [AdminSlidersController::class, 'store'])->name('admin-sliders.store');
    Route::get('/admin/sliders/{table}/edit/{id}', [AdminSlidersController::class, 'edit'])->name('admin-sliders.edit');
    Route::patch('/admin/sliders/{table}/{id}', [AdminSlidersController::class, 'update'])->name('admin-sliders.update');
    Route::delete('/admin/sliders/{table}/{id}', [AdminSlidersController::class, 'destroy'])->name('admin-sliders.destroy');

    // Админ Категории
    Route::get('/admin/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/admin/categories/{table}', [AdminCategoriesController::class, 'create'])->name('admin-categories.create');
    Route::post('/admin/categories', [AdminCategoriesController::class, 'store'])->name('admin-categories.store');
    Route::get('/admin/categories/{table}/edit/{id}', [AdminCategoriesController::class, 'edit'])->name('admin-categories.edit');
    Route::patch('/admin/categories/{table}/{id}', [AdminCategoriesController::class, 'update'])->name('admin-categories.update');
    Route::delete('/admin/categories/{table}/{id}', [AdminCategoriesController::class, 'destroy'])->name('admin-categories.destroy');

    // Админ Изображения категорий
    Route::get('/admin/category-images', [AdminCategoryImagesController::class, 'index'])->name('admin.category-images');
    Route::get('/admin/category-images/{table}', [AdminCategoryImagesController::class, 'create'])->name('admin-category-images.create');
    Route::post('/admin/category-images', [AdminCategoryImagesController::class, 'store'])->name('admin-category-images.store');
    Route::get('/admin/category-images/{table}/edit/{id}', [AdminCategoryImagesController::class, 'edit'])->name('admin-category-images.edit');
    Route::patch('/admin/category-images/{table}/{id}', [AdminCategoryImagesController::class, 'update'])->name('admin-category-images.update');
    Route::delete('/admin/category-images/{table}/{id}', [AdminCategoryImagesController::class, 'destroy'])->name('admin-category-images.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Корзина
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{cartItemId}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/order-placement/{id}', [CartController::class, 'store'])->name('cart.order-placement');
});

require __DIR__ . '/auth.php';
