<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// ✅ YOUR ACTIVITY ROUTES (IMPORTANT)
Route::middleware(['auth'])->group(function () {

    Route::resource('orders', OrderController::class);
    Route::resource('customers', CustomerController::class);

    Route::middleware(['admin'])->group(function () {
        Route::resource('products', ProductController::class);
    });

});

// Breeze default routes (DO NOT REMOVE)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';