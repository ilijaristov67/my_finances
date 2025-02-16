<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['admin', 'auth:sanctum'])
    ->prefix('categories/')
    ->name('categories.')
    ->group(function(){
        Route::get('/', [CategoriesController::class, 'index'])->name('list');
        Route::get('{category}', [CategoriesController::class, 'show'])->name('show');
        Route::post('category-create', [CategoriesController::class, 'store'])->name('store');
        Route::delete('{category}/category-delete', [CategoriesController::class, 'destroy'])->name('destroy');
        Route::put('{category}/category-update', [CategoriesController::class, 'update'])->name('update');
    });

Route::prefix('users/')
    ->name('users.')
    ->group(function(){
        Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('logout',[AuthController::class, 'logout'])->name('logout');
        });
    });
