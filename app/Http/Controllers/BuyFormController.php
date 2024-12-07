<?php

namespace App\Http\Controllers;

use App\Models\BuyForm;
use App\Models\treeForSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyFormController extends Controller
{
    public function showBuyForm($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página');
        }

        $tree = treeForSale::with(['specie', 'friend'])->find($id);

        if (!$tree) {
            return redirect()->route('BuyForm.main')->with('error', 'Árbol no encontrado');
        }

        return view('Buyform.main', compact('tree', 'user'));
    }



    public function confirmPurchase(Request $request)
    {
        $buyerId = Auth::id();
    
        if (!$buyerId) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para realizar esta acción.');
        }
    
        $request->validate([
            'treeId' => 'required|exists:tree,id',
        ]);
    
        $tree = treeForSale::find($request->treeId);
    
        if (!$tree || $tree->status === 'sold') {
            return redirect()->route('BuyForm.main', $request->treeId)->with('error', 'Este árbol ya ha sido vendido.');
        }
        
        $tree->update([
            'idFriend' => $buyerId,  
            'status' => 'sold',      
        ]);
    
        return redirect()->route('availableTrees.main', $request->treeId)->with('success', 'Árbol comprado con éxito.');
    }
    
    
}
