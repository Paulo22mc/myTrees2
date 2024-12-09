<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TreeUpdates;
use Illuminate\Support\Facades\Auth;

class TreeUpdatesController extends Controller
{
    /**
     * Registra una actualización del árbol.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request)
    {
        $validated = $request->validate([
            'idTree' => 'required|exists:trees,id', 
            'size' => 'required|integer|min:1',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Almacenar la imagen en el sistema de archivos
        $photoPath = $request->file('photo')->store('photos', 'public');

        // Crear el registro en la base de datos
        $treeUpdate = TreeUpdates::create([
            'idTree' => $validated['idTree'], 
            'idUser' => Auth::id(),           
            'date' => now(),                   
            'size' => $validated['size'],      
            'photo' => $photoPath,             
        ]);

        return redirect()->route('updates.main')->with('success', 'Tree species updated successfully.');

    }
}
