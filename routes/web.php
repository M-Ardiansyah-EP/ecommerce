<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', RoleMiddleware::class . ': admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('user-products', [ProductController::class, 'userIndex'])->name('products.user_index');
    Route::get('user-categories', [CategoryController::class, 'userIndex'])->name('categories.user_index');
    Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy']);

    Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('payment/{payment}', [PaymentController::class, 'show'])->name('payment.show');
    
    Route::get('/payment/pdf', [PaymentController::class, 'generatePdf'])->name('payment.pdf');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
