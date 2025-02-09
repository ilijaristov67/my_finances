<?php

use App\Http\Controllers\Api\CategoriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('admin')
    ->prefix('categories/')
    ->name('categories.')
    ->group(function(){
        Route::get('/', [CategoriesController::class, 'index'])->name('list');
        Route::get('/{category}', [CategoriesController::class, 'show'])->name('show');
        Route::post('/category-create', [CategoriesController::class, 'store'])->name('store');
        Route::delete('{category}/category-delete', [CategoriesController::class, 'destroy'])->name('destroy');
        Route::put('{category}/category-update', [CategoriesController::class, 'update'])->name('update');
    });