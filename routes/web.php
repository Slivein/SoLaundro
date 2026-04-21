<?php

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
        Route::middleware(['auth.member'])->group(function () {
            // After Login Routes
            Route::get('/home', HomeController::class)->name('home');
            Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
            Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        });
    });
});

Route::fallback(function () {
    return redirect()->route('welcome');
});
