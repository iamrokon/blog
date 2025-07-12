<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BlogDetailsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Frontend routes
Route::get('/', HomeController::class)->name('frontend.home');
Route::get('/blogs/{job}', BlogDetailsController::class)->name('frontend.job_details');

// Admin Dashboard routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
    Route::resource('blogs', BlogController::class, ['as'=>'admin']);
});

require __DIR__.'/auth.php';
