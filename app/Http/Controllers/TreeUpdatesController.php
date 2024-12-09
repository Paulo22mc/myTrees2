<?php

namespace App\Http\Controllers;

use App\Models\TreeUpdates;
use App\Models\TreeForSale;
use App\Models\TreeSpecies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TreeUpdatesController extends Controller
{

    public function edit($id)
    {
        
        $tree = TreeForSale::findOrFail($id);

       
        $species = TreeSpecies::all();

     
        return view('updates.update', compact('tree', 'species'));
    }

 
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'idSpecie' => 'required|exists:tree_species,id', 
            'size' => 'required|numeric|min:1',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
        ]);

        
        $tree = TreeForSale::findOrFail($id);

       
        $tree->idSpecie = $request->idSpecie;
        $tree->size = $request->size;

        
        if ($request->hasFile('photo')) {
            
            if ($tree->photo) {
                Storage::delete('public/' . $tree->photo);
            }

           
            $photoPath = $request->file('photo')->store('tree_photos', 'public');
            $tree->photo = $photoPath;
        }

       
        $tree->save();

        
        TreeUpdates::create([
            'idTree' => $tree->id,
            'idUser' => Auth::id(), 
            'date' => now(), 
            'size' => $tree->size,
            'photo' => $tree->photo,
        ]);

       
        return redirect()->route('tree.details', ['id' => $tree->id])
            ->with('success', 'Tree updated successfully!');
    }
}
