<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Category\DeleteCategoryController;
use App\Http\Controllers\Category\IndexCategoryController;
use App\Http\Controllers\Category\StoreCategoryController;
use App\Http\Controllers\Category\UpdateCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['admin', 'auth:sanctum'])
    ->prefix('categories/')
    ->name('categories.')
    ->group(function () {
        Route::get('', IndexCategoryController::class)->name('index');
        Route::post('category-create', StoreCategoryController::class)->name('category-create');
        Route::put('category-update/{category}', UpdateCategoryController::class)->name('category-update');
        Route::delete('category-delete/{category}', DeleteCategoryController::class)->name('category-delete');
    });

Route::prefix('users/')
    ->name('users.')
    ->group(function () {
        Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        });
    });
