<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $games = \App\Models\Game::where('is_active', true)->orderBy('category')->get();
    $categories = \App\Models\Category::orderBy('name')->get();
    return view('welcome', compact('games', 'categories'));
});

// Game routes
Route::get('/play/{gameId}', [GameController::class, 'play'])->name('games.play');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('/games', AdminGameController::class, ['as' => 'admin']);
        Route::resource('/categories', CategoryController::class, ['as' => 'admin']);
        Route::resource('/admins', AdminUserController::class, ['as' => 'admin'])->only(['index', 'create', 'store', 'destroy']);
        
        // Settings
        Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
        Route::put('/settings/profile', [\App\Http\Controllers\Admin\SettingsController::class, 'updateProfile'])->name('admin.settings.profile');
        Route::put('/settings/password', [\App\Http\Controllers\Admin\SettingsController::class, 'updatePassword'])->name('admin.settings.password');
        
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
