<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableTree; 

class AvailableTreesController extends Controller
{
    //Obtener los árboles disponibles
    public function index(Request $request)
    {
        $trees = AvailableTree::with('specie')
            ->where('status', 'available')
            ->get();

        return view('availableTrees.main', compact('trees'));
    }
}
