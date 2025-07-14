<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostDetailsController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', HomeController::class)->name('frontend.home');
Route::get('/posts/{post}', PostDetailsController::class)->name('frontend.post_details');

// Admin Dashboard routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
    Route::resource('posts', PostController::class, ['as'=>'admin']);
});

require __DIR__.'/auth.php';
