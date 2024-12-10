<?php

namespace App\Http\Controllers;

use App\Models\TreeUpdates;
use App\Models\TreeForSale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TreeUpdatesController extends Controller
{
    //Mostrar los árboles vendidos (para poder hacerles actulizaciones)
    public function index()
    {
        $trees = TreeForSale::with('specie')
            ->where('status', 'sold')
            ->get();

        return view('updates.main', compact('trees'));
    }

    //Redirigir a la ventana de crear una nueva actualización
    public function create($idTree)
    {
        $tree = TreeForSale::findOrFail($idTree);
        return view('updates.update', compact('tree'));
    }

    //Guardar una actualización
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

    //Mostrar una actualización de un árbol
    public function showUpdates()
    {
        $updates = TreeUpdates::all();
        return view('updates.show', compact('updates'));
    }


    //Mostrar las actualizaciones de los árboles del usuario amigo
    public function showFriendUpdates()
    {
        $user = Auth::user();

        $updates = TreeUpdates::whereHas('tree', function ($query) use ($user) {
            $query->where('idFriend', $user->id);
        })->with('tree')
            ->get();

        return view('layoutFriend.updates', compact('updates'));
    }
}
