<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FriendController;

// Ruta para mostrar el formulario de login
Route::get('/', [AuthenticationController::class, 'showLoginForm'])->name('login');


// Ruta para procesar el login
Route::post('/', [AuthenticationController::class, 'authenticate']);


// Ruta para procesar el logout (cerrar sesión)
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');


// Ruta para mostrar el formulario de registro
Route::get('/register', [AuthenticationController::class, 'showRegistrationForm'])->name('register');


// Ruta para procesar el registro
Route::post('/register', [AuthenticationController::class, 'register']);


Route::get('/admin/dashboard', [AdminController::class, 'showMainView'])->name('admin.dashboard');
//Route::get('/operator/dashboard', [OperatorController::class, 'index'])->name('operator.dashboard');
Route::get('/friend/dashboard', [FriendController::class, 'showMainView'])->name('friend.dashboard');

