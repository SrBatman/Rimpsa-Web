<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;




Route::controller(RoutesController::class)-> group(function(){
    Route::get('/', 'index')-> name('index');
    Route::get('nosotros', 'about')-> name('nosotros');
    Route::get('tienda', 'store')->name('tienda');
    Route::get('contacto', 'contact')-> name('contacto');
    Route::get('producto/{slug}', 'producto')-> name('producto');
    Route::get('carrito', 'carrito')-> name('carrito');
    Route::get('/search-products', 'searchProducts')->name('search.products');
    
});

Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('dashboard', [App\Http\Controllers\Admin\Dashboard::class, 'index'])->name('admin.dashboard');

    // Rutas de productos
    Route::controller(App\Http\Controllers\Admin\ProductsController::class)->group(function () {
        Route::get('/products', 'index');
  
        Route::post('/products','store');
        Route::get('/products/edit/{product}', 'edit');
        Route::put('/products/{product}', 'update');

        Route::delete('/products/{product}', 'destroy');
    });

    // Rutas de categorias
    Route::controller(App\Http\Controllers\Admin\CategoriesController::class)->group(function () {
        Route::get('/categories', 'index');

        Route::post('/categories','store');
        Route::get('/categories/edit/{category}', 'edit');
        Route::put('/categories/{category}', 'update');

        Route::delete('/categories/{category}', 'destroy');
    });

    //Rutas de marcas
    Route::controller(App\Http\Controllers\Admin\BrandsController::class)->group(function () {
        Route::get('/brands', 'index');
        
        Route::post('/brands','store');
        Route::get('/brands/edit/{brand}', 'edit');
        Route::put('/brands/{brand}', 'update');

        Route::delete('/brands/{brand}', 'destroy');
    });


    //Rutas de logs
    Route::controller(App\Http\Controllers\Admin\LogsController::class)->group(function () {
        Route::get('/logs', 'index');
        Route::post('/logs','store');
    });


    Route::controller(App\Http\Controllers\Admin\StoragesController::class)->group(function () {
        Route::get('/monitoring', 'index');
    });

    //Rutas de usuarios
    Route::controller(App\Http\Controllers\Admin\UsersController::class)->group(function () {
        Route::get('/users', 'index');
  
        Route::post('/users','store');
        Route::get('/users/edit/{user}', 'edit');
        Route::put('/users/{user}', 'update');

        Route::delete('/users/{user}', 'destroy');
    });

    //Rutas de ordenes
    Route::controller(App\Http\Controllers\Admin\OrdersController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');
    
        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
        Route::get('/orders/{orderId}/mail', 'sendInvoiceEmail')->name('admin.orders.mailInvoice'); // Nueva ruta agregada
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::post('/cart', [App\Http\Controllers\CartController::class, 'store']);

    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
});

// Twitter Login
Route::get('/auth/twitter', [LoginController::class, 'redirectToTwitter'])->name('auth.twitter');
Route::get('/auth/twitter/callback', [LoginController::class, 'handleTwitterCallback']);

// Facebook Login
Route::get('/auth/facebook', [LoginController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

//Agregar al carrito
// Route::post('/cart', [App\Http\Controllers\CartController::class, 'store']);