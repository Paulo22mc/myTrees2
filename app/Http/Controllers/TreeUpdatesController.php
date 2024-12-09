<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TreeUpdates;
use Illuminate\Support\Facades\Auth;

class TreeUpdatesController extends Controller
{

    public function save(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'idTree' => 'required|exists:trees,id', // Verificar que el árbol exista
            'size' => 'required|integer|min:1', // Validación para el tamaño
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validación para la foto
        ]);
    
        // Encontrar el árbol correspondiente usando el ID del árbol
        $tree = TreeUpdates::findOrFail($validated['idTree']);
        $tree->size = $validated['size']; // Actualizar el tamaño
    
        $tree->idUser = Auth::id(); // Asignar el usuario autenticado
    
        // Si se ha subido una nueva foto
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Guardar la foto
            $tree->photo = $photoPath; // Guardar la ruta de la foto
        }
    
        // Guardar los cambios
        $tree->save();
    
        // Redirigir a la vista de detalles del árbol actualizado
        return redirect()->route('friends.show', ['id' => $tree->id])->with('success', 'Tree updated successfully');
    }
    



    public function create($id)
    {
        // Encontrar el árbol por ID
        $tree = TreeUpdates::findOrFail($id);

        // Pasar el árbol a la vista para llenar el formulario con los datos actuales
        return view('updates.save', compact('tree'));
    }
}
