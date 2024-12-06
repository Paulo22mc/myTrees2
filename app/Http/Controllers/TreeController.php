<?php

namespace App\Http\Controllers;

use App\Models\treeForSale;
use App\Models\TreeSpecies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreeController extends Controller
{
    public function create()
    {
        // Obtener id y comercialName de todas las especies
        $species = TreeSpecies::select('id', 'comercialName')->get();

        // Pasar los datos a la vista
        return view('treeForSale.create', compact('species'));
    }

    // Guardar un nuevo árbol
    public function save(Request $request)
    {
        try {
            $request->validate([
                'treeSpecie'    => 'required|exists:treeSpecies,id', 
                'ubication'     => 'required|string|max:255',
                'size'          => 'required|integer|min:10',
                'price'         => 'required|numeric|min:500',
                'photo'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);

            // Subir foto si se proporciona
            $photoPath = $request->hasFile('photo')
                ? $request->file('photo')->store('photos', 'public')
                : null;

            // Crear el árbol en venta en la tabla 'tree'
            treeForSale::create([
                'idSpecie'  => $request->treeSpecie,
                'idFriend'  => Auth::id(),
                'ubication' => $request->ubication,
                'status'    => 'available',
                'size'      => $request->size,
                'price'     => $request->price,
                'photo'     => $photoPath
            ]);

            return redirect()->route('treeForSale.show')->with('success', 'Tree saved successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // Mostrar todos los árboles en venta
    public function index()
    {
        // Obtener árboles con relaciones de especie y amigo (usuario)
        $trees = treeForSale::with('specie', 'friend')->get();
        return view('treeForSale.show', compact('trees'));
    }

    /*

     //Editar un árbol
    public function edit($id)
    {
        $tree = treeForSale::findOrFail($id);
        $species = treeSpecies::all();
        return view('treeForSale.edit', compact('tree', 'species'));
    }

    // Actualizar un árbol
    /*
    public function update(Request $request, $id)
    {
        $request->validate([
            'treeSpecie'    => 'required|exists:species,id',
            'ubication'     => 'required|string|max:255',
            'size'          => 'required|integer|min:10',
            'price'         => 'required|numeric|min:500',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $tree = treeForSale::findOrFail($id);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $tree->photo = $photoPath;
        }
        $tree->update([
            'idSpecie'  => $request->treeSpecie,
            'ubication' => $request->ubication,
            'size'      => $request->size,
            'price'     => $request->price
        ]);

        return redirect()->route('treeForSale.show')->with('success', 'Tree updated successfully');
    }

    // Eliminar un árbol
    public function destroy($id)
    {
        $tree = treeForSale::findOrFail($id);
        $tree->delete();

        return redirect()->route('treeForSale.show')->with('success', 'Tree deleted successfully');
    }

    */
}
