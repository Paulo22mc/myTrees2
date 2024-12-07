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



    // Confirmar la compra
    public function confirmPurchase(Request $request)
    {
        $request->validate([
            'treeId' => 'required|exists:treeForSale,id',
            'buyerId' => 'required|exists:users,id',
        ]);

        $tree = treeForSale::find($request->treeId);

        if ($tree->status === 'sold') {
            return redirect()->route('BuyForm.main', $request->treeId)->with('error', 'Este árbol ya ha sido vendido');
        }
        $tree->idFriend = $request->buyerId;
        $tree->status = 'sold';
        $tree->save();

        BuyForm::create([
            'tree_id' => $tree->id,
            'user_id' => $request->buyerId,
            'status' => 'confirmed',
        ]);

        return redirect()->route('BuyForm.main', $request->treeId)->with('success', 'Compra confirmada con éxito');
    }
}
