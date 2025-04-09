<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('flyingmusic.index');
Route::get('/music/index', [MusicController::class, 'index'])->name('music.index');
Route::post('/music', [MusicController::class, 'store'])->name('music.store');
