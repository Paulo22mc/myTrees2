<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableTree; // Cambia a AvailableTree
use App\Models\availableTrees;

class AvailableTreesController extends Controller
{
    public function index(Request $request)
    {
        // Obtener árboles disponibles con la especie
        $trees = AvailableTree::with('specie') 
            ->where('status', 'available')
            ->get();

        return view('availableTrees.main', compact('trees'));
    }

    /*
    public function showBuyForm($id)
    {
        $tree = AvailableTree::with('specie')->findOrFail($id);

        return view('availableTrees.form', compact('tree'));
    }
    */
}

