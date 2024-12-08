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

        $tree->idSpecie = $request->input('idSpecie');
        $tree->size = $request->input('size');
        $tree->ubication = $request->input('ubication');
        $tree->status = $request->input('status');

        // Guarda los cambios
        $tree->save();

        return redirect()->route('friendDetails', ['id' => $tree->idFriend])
            ->with('success', 'Tree updated successfully!');
    }
}
