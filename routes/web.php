<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;


Route::get('/home', function () {
    return view('home');
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/app', function () {
    return view('app');
});


// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');


// Order Success
Route::get('/order-success', function () {
    return view('order-success');
})->name('order.success');


// User Cart Routes
Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::patch('/cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

// My Orders Route
Route::get('/my-orders', [OrderController::class, 'index'])
    ->name('orders.index');

    // ALB Health Check
Route::get('/health', function () {
    return response('OK', 200);
});