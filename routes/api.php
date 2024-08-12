<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/cart', [CartController::class, 'store']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::put('/cart/{id}', [CartController::class, 'update']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);
});


Route::get('/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'getCategories']);
Route::get('/brands', [App\Http\Controllers\Admin\BrandsController::class, 'getBrands']);

// Route::post('/cart', [App\Http\Controllers\CartController::class, 'store']);