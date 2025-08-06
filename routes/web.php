<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\VerifyEmailController;

// Página de inicio
Route::get('/', fn() => view('home'))->name("home");

// Dashboard protegido
Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de autenticación con Google
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

// Mostrar aviso de verificación
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Ruta que maneja el clic del correo
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marca el correo como verificado
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Ruta para reenviar el correo
Route::middleware(['auth', 'throttle:6,1'])->group(function () {
    Route::post('/email/verification-notification', [VerifyEmailController::class, 'resend'])
        ->name('verification.send');
});
require __DIR__ . '/auth.php';

// Rutas del resto del proyecto ya despues de aver sido loggeados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
