<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'getCategories']);
Route::get('/brands', [App\Http\Controllers\Admin\BrandsController::class, 'getBrands']);