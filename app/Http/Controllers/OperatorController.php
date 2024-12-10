<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\treeForSale;
use App\Models\TreeUpdates;
use Illuminate\Support\Facades\Auth;
use App\Models\TreeSpecies;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    //Redirige a la vista principal
    public function showMainView()
    {
        $totalFriends = User::where('role', 'friend')->count();
        $totalAvailableTrees = treeForSale::where('status', 'available')->count();

        return view('layoutOperator.main', compact('totalFriends', 'totalAvailableTrees'));
    }

    //Busca los árboles con estado vendido para después actualizarlos
    public function index()
    {
        $trees = TreeForSale::with('specie')
            ->where('status', 'sold')
            ->get();

        return view('updatesOperator.main', compact('trees'));
    }


    //Crear una actualización de un árbol 
    public function create($idTree)
    {
        $tree = TreeForSale::findOrFail($idTree);
        return view('updatesOperator.update', compact('tree'));
    }

    //Guardar la información de la actualización
    public function save(Request $request)
    {
        $request->validate([
            'idTree' => 'required|exists:tree,id',
            'size' => 'required|numeric|min:1',
            'photo' => 'required|image|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('photos', 'public');

        $idUser = Auth::id();

        TreeUpdates::create([
            'idTree' => $request->idTree,
            'idUser' => $idUser,
            'date' => now(),
            'size' => $request->size,
            'photo' => $photoPath,
        ]);

        return redirect()->route('updatesOperator.main')->with('success', 'Actualización guardada con éxito.');
    }

    //Mostrar las actualizaciones
    public function showUpdates()
    {
        $updates = TreeUpdates::all();
        return view('updatesOperator.show', compact('updates'));
    }
}
