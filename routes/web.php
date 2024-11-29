<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

// Ruta para mostrar el formulario de login
Route::get('/', [AuthenticationController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el login
Route::post('/login', [AuthenticationController::class, 'login']);

// Ruta para procesar el logout (cerrar sesión)
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// Ruta para mostrar el formulario de registro
Route::get('/register', [AuthenticationController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro
Route::post('/register', [AuthenticationController::class, 'register']);