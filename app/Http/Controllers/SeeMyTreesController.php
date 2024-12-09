<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SeeMyTrees;

class SeeMyTreesController extends Controller
{
    public function index()
    {
        // Obtener el usuario logueado
        $user = Auth::user();
    
        // Obtener los árboles del usuario con el join entre 'tree' y 'treeSpecie'
        $trees = SeeMyTrees::where('idFriend', $user->id)
            ->join('treeSpecie', 'tree.idSpecie', '=', 'treeSpecie.id')
            ->select('tree.*', 'treeSpecie.comercialName') // Seleccionar columnas de ambas tablas
            ->get();
    
        // Pasar los datos a la vista
        return view('SeeMyTrees.main', compact('trees'));
    }
    
}