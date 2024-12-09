<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\treeForSale;
use App\Models\TreeUpdates;
use Illuminate\Support\Facades\Auth;
use App\Models\TreeSpecies;
use Illuminate\Http\Request;
class OperatorController extends Controller
{
    public function showMainView()
    {
        $totalFriends = User::where('role', 'friend')->count();
        $totalAvailableTrees = treeForSale::where('status', 'available')->count();

        return view('layoutOperator.main', compact('totalFriends', 'totalAvailableTrees'));
    }

    public function index()
    {
        $trees = TreeForSale::with('specie')
            ->where('status', 'sold')
            ->get();
    
        return view('updatesOperator.main', compact('trees'));
    }
    

    public function create($idTree)
    {
        $tree = TreeForSale::findOrFail($idTree);
        return view('updatesOperator.update', compact('tree'));
    }
   
    public function save(Request $request)
    {
        $request->validate([
            'idTree' => 'required|exists:tree,id',
            'size' => 'required|numeric|min:1',
            'photo' => 'required|image|max:2048',
        ]);
        

        $photoPath = $request->file('photo')->store('photos', 'public');

        $idUser = Auth::id();

     
        TreeUpdates::create([
            'idTree' => $request->idTree,
            'idUser' => $idUser,
            'date' => now(),
            'size' => $request->size,
            'photo' => $photoPath,
        ]);

        return redirect()->route('updatesOperator.main')->with('success', 'Actualización guardada con éxito.');
    }

    //show updates
    public function showUpdates()
    {
        // Obtener todos los registros de actualizaciones
        $updates = TreeUpdates::all();

        // Pasar los registros a la vista
        return view('updatesOperator.show', compact('updates'));
    }

}
