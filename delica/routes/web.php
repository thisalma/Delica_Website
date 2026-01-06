<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProviderController;

/*
|--------------------------------------------------------------------------
| Provider Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Provider\DashboardController;
use App\Http\Controllers\Provider\ProductController;
use App\Http\Controllers\Provider\OrderController;

/*
|--------------------------------------------------------------------------
| Customer Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\CartController;

/*
|--------------------------------------------------------------------------
| Livewire Components
|--------------------------------------------------------------------------
*/
use App\Livewire\CartPage;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Redirect After Login
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
Route::prefix('customer')
    ->middleware(['auth', 'role:customer'])
    ->group(function () {

        Route::get('/dashboard', fn () => view('customer.dashboard'))
            ->name('customer.dashboard');

        // Products
        Route::get('/products', [CustomerProductController::class, 'index'])
            ->name('customer.products');

        Route::get('/products/{product}', [CustomerProductController::class, 'show'])
            ->name('customer.products.show');

        // 🛒 CART (Livewire)
        Route::get('/cart', CartPage::class)
            ->name('customer.cart');

        // Add to cart
        Route::post('/cart/add/{product}', [CartController::class, 'add'])
            ->name('customer.cart.add');

        // Orders & Profile
        Route::get('/orders', fn () => 'Order History Page')
            ->name('customer.orders');

        Route::get('/profile', fn () => 'Profile Page')
            ->name('customer.profile');
    });

/*
|--------------------------------------------------------------------------
| Provider Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:provider'])->group(function () {

    Route::get('/provider/dashboard', [DashboardController::class, 'index'])
        ->name('provider.dashboard');

    // Products
    Route::get('/products', [ProductController::class, 'index'])
        ->name('provider.products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('provider.products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('provider.products.store');

    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
        ->name('provider.products.edit');

    Route::put('/products/{product}', [ProductController::class, 'update'])
        ->name('provider.products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('provider.products.destroy');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])
        ->name('provider.orders');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Separate Guard)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('admin.login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('admin.logout');

    // Protected
    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', fn () => view('admin.dashboard'))
            ->name('admin.dashboard');

        // Customers
        Route::get('/customers', [CustomerController::class, 'index'])
            ->name('admin.customers');

        // Providers
        Route::get('/providers', [ProviderController::class, 'index'])
            ->name('admin.providers');

        Route::get('/providers/approve/{id}', [ProviderController::class, 'approve'])
            ->name('admin.providers.approve');

        Route::get('/providers/decline/{id}', [ProviderController::class, 'decline'])
            ->name('admin.providers.decline');
    });
});

/*
|--------------------------------------------------------------------------
| Jetstream Default Dashboard (Fallback)
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/dashboard', function () {
    return redirect('/redirect');
})->name('dashboard');
