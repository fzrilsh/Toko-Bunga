<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('/', DashboardController::class)->names('dashboard');
Route::resource('/products', ProductController::class)->names('products');
// Route::resource('/pages', PageController::class)->names('pages');

Route::prefix('/admin')->group(function(){
    Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

    Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'Login'])->name('login.post');

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::group(['prefix' => 'products'], function(){
            Route::get('/', [AdminController::class, 'showProducts'])->name('admin.products');
            Route::get('/interact/{product?}', [AdminController::class, 'showUpdateProductForm'])->name('admin.products.interact');
            Route::post('/interact/{product?}', [AdminController::class, 'updateProduct'])->name('admin.products.interact.post');
        });
    });
}); 
Route::group(['middleware' => ['auth:web']], function(){
});