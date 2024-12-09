<?php

namespace App\Http\Controllers;

use App\Models\TreeUpdate;
use App\Models\Tree;
use App\Models\treeForSale;
use App\Models\TreeUpdates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreeUpdatesController extends Controller
{
    // Muestra el formulario para actualizar el árbol
    public function create()
    {
        $trees = treeForSale::all(); 
        return view('TreeUpdates.create', compact('trees'));
    }

    // Almacena la actualización del árbol
    public function store(Request $request)
    {
        $request->validate([
            'idTree' => 'required|exists:trees,id',
            'size' => 'required|numeric',
            'photo' => 'required|image',
        ]);

        // Subir la foto y obtener el nombre del archivo
        $photoPath = $request->file('photo')->store('photos', 'public');

        // Crear el registro en la tabla TreeUpdates
        TreeUpdates::create([
            'idTree' => $request->idTree,
            'idUser' => Auth::id(), 
            'date' => now(), 
            'size' => $request->size,
            'photo' => $photoPath,
        ]);

        return redirect()->route('TreeUpdates.create')->with('success', 'Actualización registrada correctamente');
    }
}
