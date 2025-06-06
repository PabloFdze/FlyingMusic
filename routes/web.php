<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PagesController::class, 'index'])->name('flyingmusic.index');

Route::get('/sign_in', [PagesController::class, 'sign_in'])->name('flyingmusic.sign_in');

Route::post('/register', [PagesController::class, 'register'])->name('flyingmusic.register');

Route::get('/log_in', [PagesController::class, 'log_in'])->name('flyingmusic.login');

Route::post('/log', [PagesController::class, 'log'])->name('flyingmusic.log');

Route::get('/music', [MusicController::class, 'index'])->name('flyingmusic.music');

Route::get('/music/upload', [MusicController::class, 'create'])->name('flyingmusic.upload');

Route::post('/music', [MusicController::class, 'store'])->name('flyingmusic.store');

Route::get('/premium/access/index', [SubscriptionController::class, 'premiumPage'])->name('premium.page');

Route::get('/premium/access', [SubscriptionController::class, 'form'])->name('premium.access');

Route::post('/premium/access', [SubscriptionController::class, 'makePremium'])->name('premium.upgrade');

Route::delete('/music/{title}', [SubscriptionController::class, 'destroy'])->name('music.destroy');

Route::post('/logout', [PagesController::class, 'logout'])->name('flyingmusic.logout');

//Playlist
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('playlists.show');
Route::get('/playlistsfree/{id}', [PlaylistController::class, 'showFree'])->name('playlists.showfree');
Route::post('/playlists/add-song', [PlaylistController::class, 'addSong'])->name('playlists.addSong');
Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');

