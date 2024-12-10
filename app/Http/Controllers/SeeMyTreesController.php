<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SeeMyTrees;

class SeeMyTreesController extends Controller
{
    //Muestra los árboles asociados a un usuario 
    public function index()
    {
        $user = Auth::user();

        $trees = SeeMyTrees::where('idFriend', $user->id)
            ->join('treeSpecie', 'tree.idSpecie', '=', 'treeSpecie.id')
            ->select('tree.*', 'treeSpecie.comercialName') // Seleccionar columnas de ambas tablas
            ->get();

        return view('SeeMyTrees.main', compact('trees'));
    }
}
