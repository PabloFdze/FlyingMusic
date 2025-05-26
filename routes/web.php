<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PagesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PagesController::class, 'index'])->name('flyingmusic.index');
Route::get('/sign_in', [PagesController::class, 'sign_in'])->name('flyingmusic.sign_in');
Route::get('/log_in', [PagesController::class, 'log_in'])->name('flyingmusic.login');
Route::get('/music', [MusicController::class, 'index'])->name('flyingmusic.music');
Route::get('/music/upload', [MusicController::class, 'create'])->name('flyingmusic.upload');
Route::post('/music', [MusicController::class, 'store'])->name('flyingmusic.store');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);



/*// Registro
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/login', function () {
    return view('pages.login');
})->name('flyingmusic.login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Credenciales incorrectas.',
    ]);
});
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

 Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard'); // o donde tú quieras
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Correo de verificación enviado.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');*/