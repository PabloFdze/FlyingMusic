<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PagesController;
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




