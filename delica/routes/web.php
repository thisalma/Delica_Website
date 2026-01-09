<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

//Admin Controllers
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProviderController;

//Provider Controllers
use App\Http\Controllers\Provider\DashboardController;
use App\Http\Controllers\Provider\ProductController as ProviderProductController;
use App\Http\Controllers\Provider\OrderController as ProviderOrderController;

//Customer Controllers
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;

//Livewire Components
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;

//Public Routes
Route::get('/', function () {
    return view('welcome');
});

//Redirect After Login
Route::get('/redirect', [RedirectController::class, 'index'])
    ->middleware('auth')
    ->name('redirect');

//Customer Routes
Route::prefix('customer')
    ->middleware(['auth', 'role:customer'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', fn () => view('customer.dashboard'))
            ->name('customer.dashboard');

        // Products
        Route::get('/products', [CustomerProductController::class, 'index'])
            ->name('customer.products');

        Route::get('/products/{product}', [CustomerProductController::class, 'show'])
            ->name('customer.products.show');

        // Cart (Livewire)
        Route::get('/cart', CartPage::class)
            ->name('customer.cart');

        Route::post('/cart/add/{product}', [CartController::class, 'add'])
            ->name('customer.cart.add');

        // Checkout (Livewire page view)
        Route::get('/checkout', fn () => view('customer.checkout'))
            ->name('customer.checkout');

        // Orders (Customer Order History)
        Route::get('/orders', [CustomerOrderController::class, 'index'])
            ->name('customer.orders');

        // Profile
        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('customer.profile');

        Route::post('/profile', [ProfileController::class, 'update'])
            ->name('customer.profile.update');
    });

//Provider Routes
Route::prefix('provider')
    ->middleware(['auth', 'role:provider'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('provider.dashboard');

        // Products
        Route::get('/products', [ProviderProductController::class, 'index'])
            ->name('provider.products.index');

        Route::get('/products/create', [ProviderProductController::class, 'create'])
            ->name('provider.products.create');

        Route::post('/products', [ProviderProductController::class, 'store'])
            ->name('provider.products.store');

        Route::get('/products/{product}/edit', [ProviderProductController::class, 'edit'])
            ->name('provider.products.edit');

        Route::put('/products/{product}', [ProviderProductController::class, 'update'])
            ->name('provider.products.update');

        Route::delete('/products/{product}', [ProviderProductController::class, 'destroy'])
            ->name('provider.products.destroy');

        // Orders
        Route::get('/orders', [ProviderOrderController::class, 'index'])
            ->name('provider.orders');
    });

//Admin Routes
Route::prefix('admin')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('admin.login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', fn () => view('admin.dashboard'))
            ->name('admin.dashboard');

        Route::get('/customers', [CustomerController::class, 'index'])
            ->name('admin.customers');

        Route::get('/providers', [ProviderController::class, 'index'])
            ->name('admin.providers');

        Route::get('/providers/approve/{id}', [ProviderController::class, 'approve'])
            ->name('admin.providers.approve');

        Route::get('/providers/decline/{id}', [ProviderController::class, 'decline'])
            ->name('admin.providers.decline');
    });
});

//Jetstream Default Dashboard (Fallback)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/dashboard', function () {
    return redirect('/redirect');
})->name('dashboard');
