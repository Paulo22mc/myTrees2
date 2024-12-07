<?php

use App\Http\Controllers\AddUsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\TreeSpeciesController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\AvailableTreesController;
use App\Http\Controllers\BuyFormController;
use App\Http\Controllers\SeeMyTreesController;

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

//Mostrar dashboard de admin
Route::get('/admin/dashboard', [AdminController::class, 'showMainView'])->name('admin.dashboard');

//Mostrar dashboard de operator
Route::get('/operator/dashboard', [OperatorController::class, 'showMainView'])->name('operator.dashboard');

//Mostrar dashboard de friend
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

// Eliminar las especies registradas
Route::delete('/treeSpecie/{id}', [TreeSpeciesController::class, 'destroy'])->name('treeSpecie.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('treeForSale/create', [TreeController::class, 'create'])->name('treeForSale.create');
    Route::post('treeForSale/save', [TreeController::class, 'save'])->name('treeForSale.save');
    Route::get('/treesForSale-sale', [TreeController::class, 'index'])->name('treeForSale.index');
    Route::get('/treesForSale/show', [TreeController::class, 'index'])->name('treeForSale.show');
    
    // Editar los árboles registrados
    Route::get('/trees/{id}/edit', [TreeController::class, 'edit'])->name('treeForSale.edit');

    // Actualizar los árboles registrados
    Route::put('/treeForSale/update/{id}', [TreeController::class, 'update'])->name('treeForSale.update');

    //Elimnar los árboles registrados
    Route::delete('/trees/{id}', [TreeController::class, 'destroy'])->name('treeForSale.destroy');
});


Route::get('/AddUsers/main', [AddUsersController::class, 'addUsers'])->name('AddUsers.main');

Route::post('/AddUsers/register', [AddUsersController::class, 'register'])->name('AddUsers.register');

// ver usuarios en tabla
Route::get('/seeUsers', [AddUsersController::class, 'show'])->name('AddUsers.show');

//ir al form de editar
Route::get('/edit/{id}', [AddUsersController::class, 'edit']);

//actualizar
Route::put('/update/{id}', [AddUsersController::class, 'update'])->name('AddUsers.show');

// cancel 
Route::get('/users', [AddUsersController::class, 'show'])->name('AddUsers.show');

//eliminar usuario
Route::delete('/delete/{id}', [AddUsersController::class, 'destroy']);


Route::get('/availableTrees', [AvailableTreesController::class, 'index'])->name('availableTrees.main');


Route::get('/buyTree/{id}', [BuyFormController::class, 'showBuyForm'])->name('BuyForm.main');
Route::post('/buyTree', [BuyFormController::class, 'confirmPurchase'])->name('BuyForm.confirm');

//see my trees
Route::middleware(['auth'])->group(function () {
    Route::get('/see-my-trees', [SeeMyTreesController::class, 'seeMyTrees'])->name('seeMyTrees.main');
});

Route::get('/access-denied', function () {
    return view('accessDenied');
})->name('accessDenied');