<?php

namespace App\Http\Controllers;

use App\Models\TreeUpdates;
use App\Models\TreeForSale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TreeUpdatesController extends Controller
{
    public function index()
    {
        $trees = TreeForSale::with('specie')
            ->where('status', 'sold')
            ->get();

        return view('updates.main', compact('trees'));
    }


    public function create($idTree)
    {
        $tree = TreeForSale::findOrFail($idTree);
        return view('updates.update', compact('tree'));
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

        return redirect()->route('updates.main')->with('success', 'Actualización guardada con éxito.');
    }

    //show updates
    public function showUpdates()
    {
        $updates = TreeUpdates::all();

        return view('updates.show', compact('updates'));
    }
    public function showFriendUpdates()
    {
        $user = Auth::user();
    
        $updates = TreeUpdates::whereHas('tree', function ($query) use ($user) {
            $query->where('idFriend', $user->id);
        })->with('tree') 
        ->get();
    
        // Pasar los registros filtrados a la vista
        return view('layoutFriend.updates', compact('updates'));
    }
    
    
}