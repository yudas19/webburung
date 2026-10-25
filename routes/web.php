<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
    Route::get('register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Profile (from Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'isAdmin'])
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Hero Section
        Route::get('/hero/edit', [HeroController::class, 'edit'])->name('hero.edit');
        Route::put('/hero/update', [HeroController::class, 'update'])->name('hero.update');

        // Contents (Tips & About)
        Route::resource('contents', ContentController::class)->except(['show']);

        // Galleries
        Route::resource('galleries', GalleryController::class)->only(['index', 'create', 'store', 'destroy']);

        // Settings
        Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');
    });
