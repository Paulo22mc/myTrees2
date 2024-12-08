<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use App\Models\treeForSale;
use App\Models\TreeSpecies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendTreeController extends Controller
{
    public function index()
    {
        $friends = User::where('role', 'friend')->get();

        return view('friends.index', compact('friends'));
    }

    public function show($id)
    {
        $friend = User::findOrFail($id);

        $trees = treeForSale::where('idFriend', $id)
            ->join('treeSpecie', 'tree.idSpecie', '=', 'treeSpecie.id')
            ->select('tree.*', 'treeSpecie.comercialName')
            ->get();

        return view('friends.friendDetails', compact('friend', 'trees'));
    }

    public function edit($id)
    {
        $tree = treeForSale::findOrFail($id);

        $species = TreeSpecies::all();

        return view('friends.edit', compact('tree', 'species'));
    }

    public function update(Request $request, $id)
    {
        // Encuentra el árbol por ID
        $tree = treeForSale::findOrFail($id);

        // Actualiza los campos según los datos del formulario
        $tree->name = $request->input('name');
        $tree->idSpecie = $request->input('idSpecie');
        $tree->size = $request->input('size');
        $tree->ubication = $request->input('ubication');

        // Si se cargó una nueva foto, actualízala
        if ($request->hasFile('photo')) {
            $tree->photo = $request->file('photo')->store('trees', 'public');
        }

        // Guarda los cambios
        $tree->save();

        // Redirige a los detalles del amigo con un mensaje de éxito
        return redirect()->route('friendDetails', ['id' => $tree->idFriend])
            ->with('success', 'Tree updated successfully!');
    }
}
