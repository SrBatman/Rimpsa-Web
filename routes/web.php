<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

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