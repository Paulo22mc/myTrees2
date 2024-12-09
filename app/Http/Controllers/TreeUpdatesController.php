<?php

namespace App\Http\Controllers;

use App\Models\TreeUpdates;
use App\Models\TreeForSale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TreeUpdatesController extends Controller
{
    // Mostrar todos los árboles vendidos
    public function index()
    {
        // Obtener los árboles vendidos con el nombre comercial de treeSpecies
        $trees = TreeForSale::join('treeSpecie', 'tree.idSpecie', '=', 'treeSpecie.id')
            ->where('tree.status', 'sold') 
            ->select('tree.*', 'treeSpecie.comercialName') 
            ->get();
        $trees = TreeForSale::with('specie')->where('status', 'sold')->get();
        return view('updates.main', compact('trees'));
    }

    public function create($idTree)
    {
        $tree = TreeForSale::findOrFail($idTree);
        return view('updates.update', compact('tree'));
    }
    // Guardar la actualización en la tabla TreeUpdates
    public function save(Request $request)
    {
        // Validación de datos
        $request->validate([
            'idTree' => 'required|exists:tree,id',
            'size' => 'required|numeric|min:1',
            'photo' => 'required|image|max:2048',
        ]);
        

        $photoPath = $request->file('photo')->store('photos', 'public');

        $idUser = Auth::id();

        // Crear la actualización
        TreeUpdates::create([
            'idTree' => $request->idTree,
            'idUser' => $idUser,
            'date' => now(),
            'size' => $request->size,
            'photo' => $photoPath,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('updates.main')->with('success', 'Actualización guardada con éxito.');
    }
}
