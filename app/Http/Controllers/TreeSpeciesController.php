<?php

namespace App\Http\Controllers;

use App\Models\TreeSpecies;
use Illuminate\Http\Request;

class TreeSpeciesController extends Controller
{
    //Mostrar las especies
    public function show()
    {
        $trees = TreeSpecies::all();
        return view('treeSpecie.show', compact('trees'));
    }

    //Redirigir a la ventana de crear una nueva especie
    public function create()
    {
        return view('treeSpecie.create');
    }

    //Guardar una especie de árbol
    public function save(Request $request)
    {
        $request->validate([
            'comercialName' => 'required|string|max:255|unique:treeSpecie,comercialName',
            'scientificName' => 'required|string|max:255|unique:treeSpecie,scientificName',
        ]);
        TreeSpecies::create($request->all());

        return redirect()->route('treeSpecie.show')->with('success', 'Tree species registered successfully.');
    }

    //Editar una especie de árbol
    public function edit($id)
    {
        $tree = TreeSpecies::findOrFail($id);
        return view('treeSpecie.edit', compact('tree'));
    }


    //Actualizar una especie de árbol
    public function update(Request $request, $id)
    {
        $request->validate([
            'comercialName' => 'required|string|max:255|unique:treeSpecie,comercialName,' . $id,
            'scientificName' => 'required|string|max:255|unique:treeSpecie,scientificName,' . $id,
        ]);

        $tree = TreeSpecies::findOrFail($id);
        $tree->update($request->all());

        return redirect()->route('treeSpecie.show')->with('success', 'Tree species updated successfully.');
    }

    // Eliminar una especie de árbol
    public function destroy($id)
    {
        $tree = TreeSpecies::findOrFail($id);
        $tree->delete();
        return redirect()->route('treeSpecie.show')->with('success', 'Tree species deleted successfully.');
    }
}
