<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Game routes
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/play/{gameId}', [GameController::class, 'play'])->name('games.play');
