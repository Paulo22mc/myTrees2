<?php

namespace App\Http\Controllers;

use App\Models\treeForSale;
use App\Models\TreeSpecies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        // Validación de los datos del formulario
        $request->validate([
            'treeSpecie' => 'required|exists:treeSpecie,id',
            'ubication' => 'required|string|max:255',
            'size' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Manejar la imagen
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            return back()->withErrors(['photo' => 'Error al subir la foto.']);
        }
    
        // Crear el árbol en la base de datos
        $tree = new treeForSale();
        $tree->idSpecie = $request->treeSpecie;
        $tree->idFriend = null; // Omitido, quedará nulo por defecto
        $tree->ubication = $request->ubication;
        $tree->size = $request->size;
        $tree->price = $request->price;
        $tree->photo = $photoPath;
        $tree->status = 'available';
        $tree->save();
    
        // Redirigir con mensaje de éxito
        return redirect()->route('treeForSale.index')->with('success', 'Tree saved successfully!');
    }
    




    // Mostrar todos los árboles en venta
    public function index()
    {
        // Obtener árboles en venta con relaciones
        $trees = treeForSale::with('specie', 'friend')->get();

        // Pasar datos a la vista
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
