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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

Route::resource('/', DashboardController::class)->names('dashboard');
Route::resource('/products', ProductController::class)->names('products');
Route::resource('/pages', PageController::class)->names('pages');

// Storage endpoint - untuk serve files dari storage/app/public
Route::get('/storage/{path}', function ($path) {
    // Decode path untuk handle special characters
    $path = urldecode($path);
    
    // Check if file exists
    if (!Storage::disk('public')->exists($path)) {
        abort(404, 'File not found');
    }
    
    // Get file path
    $filePath = Storage::disk('public')->path($path);
    
    // Get file info
    $mimeType = Storage::disk('public')->mimeType($path) ?? mime_content_type($filePath);
    $fileSize = Storage::disk('public')->size($path);
    $lastModified = Storage::disk('public')->lastModified($path);
    
    // Create response with proper headers
    $response = Response::file($filePath, [
        'Content-Type' => $mimeType,
        'Content-Length' => $fileSize,
        'Cache-Control' => 'public, max-age=31536000, immutable',
        'Last-Modified' => gmdate('D, d M Y H:i:s', $lastModified) . ' GMT',
        'Expires' => gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT',
    ]);
    
    return $response;
})->where('path', '.*')->name('storage.serve');

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
