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


        // Obtener los árboles del usuario
        $trees = SeeMyTrees::with('species')
            ->where('idFriend', $user->id)
            ->get();

        // Pasar los datos a la vista
        return view('SeeMyTrees.main', compact('trees'));
    }
}
