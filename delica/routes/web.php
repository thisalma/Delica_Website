<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Provider\DashboardController;
use App\Http\Controllers\Provider\ProductController;
use App\Http\Controllers\Provider\OrderController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Redirect After Login (Customer / Provider)
|--------------------------------------------------------------------------
*/
Route::get('/redirect', [RedirectController::class, 'index'])
    ->middleware('auth')
    ->name('redirect');

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/
Route::prefix('customer')->middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/dashboard', fn () => view('customer.dashboard'))
        ->name('customer.dashboard');

    Route::get('/products', [App\Http\Controllers\Customer\ProductController::class, 'index'])
        ->name('customer.products');

    Route::get('/cart', fn () => 'Cart Page')->name('customer.cart');

     // Add to cart
    Route::post('/cart/add/{product}', [App\Http\Controllers\Customer\CartController::class, 'add'])
        ->name('customer.cart.add');
    Route::get('/orders', fn () => 'Order History Page')->name('customer.orders');
    Route::get('/profile', fn () => 'Profile Page')->name('customer.profile');

});



/*
|--------------------------------------------------------------------------
| Provider Routes (Approved Only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::get('/provider/dashboard', [DashboardController::class, 'index'])
        ->name('provider.dashboard');

         // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

     // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('provider.orders');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (SEPARATE AUTH SYSTEM)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // Admin login
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);

    // Admin protected pages
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))
            ->name('admin.dashboard');

            Route::get('/customers', [CustomerController::class, 'index'])
            ->name('admin.customers');

             // Providers
    Route::get('/providers', [ProviderController::class, 'index'])->name('admin.providers');
    Route::get('/providers/approve/{id}', [ProviderController::class, 'approve'])->name('admin.providers.approve');
    Route::get('/providers/decline/{id}', [ProviderController::class, 'decline'])->name('admin.providers.decline');
    });
});

/*
|--------------------------------------------------------------------------
| Jetstream Default Dashboard (Fallback Only)
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/dashboard', function () {
    return redirect('/redirect');
})->name('dashboard');
