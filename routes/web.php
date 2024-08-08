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
    Route::get('dashboard', [App\Http\Controllers\Admin\Dashboard::class, 'index']);

    // Otras rutas
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Twitter Login
Route::get('/auth/twitter', [LoginController::class, 'redirectToTwitter'])->name('auth.twitter');
Route::get('/auth/twitter/callback', [LoginController::class, 'handleTwitterCallback']);

// Facebook Login
Route::get('/auth/facebook', [LoginController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

//Agregar al carrito
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store']);
