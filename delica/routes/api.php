<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CartController;

// Sanctum protected routes
Route::middleware('auth:sanctum')->group(function () {
    
    // Get the current user's cart
    Route::get('/cart', [CartController::class, 'index']);

    // Add product to cart
    Route::post('/cart/add/{product}', [CartController::class, 'add']);

    // Remove product from cart
    Route::post('/cart/remove/{product}', [CartController::class, 'remove']);
});
