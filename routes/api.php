<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIcontroller;
use App\Http\Controllers\Admin\StoragesController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/cart', [CartController::class, 'store']);
//     Route::get('/cart', [CartController::class, 'index']);
//     Route::put('/cart/{id}', [CartController::class, 'update']);
//     Route::delete('/cart/{id}', [CartController::class, 'destroy']);
// });

Route::get('/login', [APIcontroller::class, 'login']);

Route::post('/storages', [StoragesController::class, 'store']);

Route::get('/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'getCategories']);
Route::middleware(['web'])->get('/brands', [App\Http\Controllers\Admin\BrandsController::class, 'getBrands']);
Route::get('/subcategories/{category_id}', [App\Http\Controllers\Admin\SubcategoriesController::class, 'getSubcategoriesByCategory']);

// Route::post('/cart', [App\Http\Controllers\CartController::class, 'store']);