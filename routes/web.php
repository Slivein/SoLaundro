<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['maintenance'])->group(function () {
    // Before Login Routes
    // Route for Welcome Page
    // Route for Static Page like Contact Us, About Us, Etc
    Route::get('/', WelcomeController::class)->name('welcome');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::middleware(['redirect.if.member'])->group(function () {
            Route::get('/login', [LoginController::class, 'create'])->name('login');
            Route::post('/login', [LoginController::class, 'store'])->name('login.store');
            Route::get('/register', [RegisterController::class, 'create'])->name('register');
            Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
        });

        Route::middleware(['auth.member'])->group(function () {
            // After Login Routes
            Route::get('/home', HomeController::class)->name('home');
            Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
            Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

            Route::get('/users/create', [RegisterController::class, 'create'])->name('users.create');
            Route::post('/users', [RegisterController::class, 'store'])->name('users.store');
        });
    });
});

Route::fallback(function () {
    return redirect()->route('welcome');
});
