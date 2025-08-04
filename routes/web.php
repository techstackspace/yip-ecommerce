<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

// 🏠 Homepage — Show products list instead of welcome page
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// 🧾 Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🛍️ Product Detail Page
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// 🛒 Cart Routes
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/checkout', [CartController::class, 'checkout'])->middleware('auth')->name('cart.checkout');

// 👤 Authenticated User Routes (Profile)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Admin-only Routes
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
});

// 🔐 Auth Scaffolding (Breeze)
require __DIR__.'/auth.php';
