<?php

namespace App\Http\Controllers;

use App\Models\TreeSpecies;
use Illuminate\Http\Request;

class TreeSpeciesController extends Controller
{
    // Mostrar la lista de especies
    public function show()
    {
        $trees = TreeSpecies::all();
        return view('treeSpecie.show', compact('trees'));
    }

    // Mostrar el formulario para registrar una nueva especie
    public function create()
    {
        return view('treeSpecie.create');
    }

    // Guardar la nueva especie
    public function save(Request $request)
    {
        $request->validate([
            'comercialName' => 'required|string|max:255',
            'scientificName' => 'required|string|max:255',
        ]);

        TreeSpecies::create($request->all());
        return redirect()->route('treeSpecie.show')->with('success', 'Tree species registered successfully.');
    }

    public function edit($id)
    {
        // Encuentra el árbol por su ID
        $tree = TreeSpecies::findOrFail($id);

        // Devuelve la vista con el objeto tree
        return view('treeSpecie.edit', compact('tree'));
    }


    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'comercialName' => 'required|string|max:255',
            'scientificName' => 'required|string|max:255',
        ]);
    
        // Encontrar el árbol por ID
        $tree = TreeSpecies::findOrFail($id);
        
        // Actualizar los datos del árbol con los valores del formulario
        $tree->update($request->all());
    
        // Redirigir a la vista de listado con un mensaje de éxito
        return redirect()->route('treeSpecie.show')->with('success', 'Tree species updated successfully.');
    }
    
    


    // Eliminar una especie
    public function destroy($id)
    {
        $tree = TreeSpecies::findOrFail($id);
        $tree->delete();
        return redirect()->route('treeSpecie.show')->with('success', 'Tree species deleted successfully.');
    }
}
