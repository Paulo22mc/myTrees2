<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

// Ruta para mostrar el formulario de login
Route::get('/', [AuthenticationController::class, 'showLoginForm'])->name('login');


// Ruta para procesar el login
Route::post('/', [AuthenticationController::class, 'login']);


// Ruta para procesar el logout (cerrar sesión)
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');


// Ruta para mostrar el formulario de registro
Route::get('/register', [AuthenticationController::class, 'showRegistrationForm'])->name('register');


// Ruta para procesar el registro
Route::post('/register', [AuthenticationController::class, 'register']);


// Ruta para 'friend'
Route::get('/main', function () {
    return view('layoutFriend.main'); 
})->name('main');


// Ruta para 'administrator'
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); 
})->name('admin_dashboard');


// Ruta para 'operator'
Route::get('/operator/dashboard', function () {
    return view('operator.dashboard'); 
})->name('operator_dashboard');
