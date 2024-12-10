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
    //Muestra los usuarios amigos
    public function index()
    {
        $friends = User::where('role', 'friend')->get();
        return view('friends.index', compact('friends'));
    }

    //Muestra los árboles asociados a un amigo por su id 
    public function show($id)
    {
        $friend = User::findOrFail($id);

        $trees = treeForSale::where('idFriend', $id)
            ->join('treeSpecie', 'tree.idSpecie', '=', 'treeSpecie.id')
            ->select('tree.*', 'treeSpecie.comercialName')
            ->get();

        return view('friends.friendDetails', compact('friend', 'trees'));
    }

    //Editar un árbol especifico 
    public function edit($id)
    {
        $tree = treeForSale::findOrFail($id);
        $species = TreeSpecies::all();

        return view('friends.edit', compact('tree', 'species'));
    }

    //Actualiza el árbol con un id especifico 
    public function update(Request $request, $id)
    {
        $tree = treeForSale::findOrFail($id);
        $tree->idSpecie = $request->input('idSpecie');
        $tree->size = $request->input('size');
        $tree->ubication = $request->input('ubication');
        $tree->status = $request->input('status');

        $tree->save();

        return redirect()->route('friendDetails', ['id' => $tree->idFriend])
            ->with('success', 'Tree updated successfully!');
    }
}
