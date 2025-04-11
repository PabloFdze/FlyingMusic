<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('flyingmusic.index');
Route::get('/sign_in', [PagesController::class, 'sign_in'])->name('flyingmusic.sign_in');
Route::get('/log_in', [PagesController::class, 'log_in'])->name('flyingmusic.log_in');
Route::get('/music', [PagesController::class, 'music'])->name('flyingmusic.music');
Route::get('/music/upload', [MusicController::class, 'create'])->name('flyingmusic.upload');
Route::post('/music', [MusicController::class, 'store'])->name('flyingmusic.store');
