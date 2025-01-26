<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ConfigurationController as AdminConfigurationController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('/', DashboardController::class)->names('dashboard');
Route::resource('/products', ProductController::class)->names('products');
Route::resource('/pages', PageController::class)->names('pages');

Route::prefix('/admin')->group(function () {
    Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

    Route::get('/login', [AuthController::class, 'LoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'Login'])->name('login.post');

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::resource('/products', AdminProductController::class)->names('admin.products');
        Route::resource('/categories', AdminCategoryController::class)->names('admin.categories');
        Route::resource('/pages', AdminPageController::class)->names('admin.pages');
        Route::resource('/configuration', AdminConfigurationController::class)->names('admin.configuration');
        Route::resource('/profile', AdminProfileController::class)->names('admin.profile');
    });
});
