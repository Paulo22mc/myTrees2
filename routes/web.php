<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\TreeSpeciesController;
use App\Http\Controllers\TreeController;


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


// Mostrar el formulario para registrar nuevas especies
Route::get('/treeSpecie/create', [TreeSpeciesController::class, 'create'])->name('treeSpecie.create');

// Registrar nueva especie de árbol
Route::post('/treeSpecie', [TreeSpeciesController::class, 'save'])->name('treeSpecie.save');

// Mostrar todas las especies registradas
Route::get('/treeSpecie/show', [TreeSpeciesController::class, 'show'])->name('treeSpecie.show');

// Ruta para mostrar el formulario de edición
Route::get('/treeSpecie/edit/{id}', [TreeSpeciesController::class, 'edit'])->name('treeSpecie.edit');

// Ruta para procesar la actualización
Route::put('/treeSpecie/update/{id}', [TreeSpeciesController::class, 'update'])->name('treeSpecie.update');

// Eliminar todas las especies registradas
Route::delete('/treeSpecie/{id}', [TreeSpeciesController::class, 'destroy'])->name('treeSpecie.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('treeForSale/create', [TreeController::class, 'create'])->name('treeForSale.create');
    Route::post('treeForSale/save', [TreeController::class, 'save'])->name('treeForSale.save');
    Route::get('/treesForSale-sale', [TreeController::class, 'index'])->name('treeForSale.index');
});
