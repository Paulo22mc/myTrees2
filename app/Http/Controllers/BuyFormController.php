<?php

namespace App\Http\Controllers;

use App\Models\BuyForm;
use App\Models\Tree;
use App\Models\treeForSale;
use Illuminate\Http\Request;

class BuyFormController extends Controller
{
    public function showBuyForm($id)
    {
        // Obtener el árbol por ID
        $tree = treeForSale::find($id);

        // Si el árbol no existe, redirigir a la página principal con un mensaje de error
        if (!$tree) {
            return redirect()->route('BuyForm.main')->with('error', 'Árbol no encontrado');
        }

        // Mostrar el formulario de compra
        return view('Buyform.main', compact('tree'));
    }

    // Confirmar la compra
    public function confirmPurchase(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'treeId' => 'required|exists:trees,id',
            'buyerId' => 'required|exists:users,id',
        ]);

        BuyForm::create([
            'tree_id' => $request->treeId,
            'user_id' => $request->buyerId,
            'status' => 'confirmed', 
        ]);

        return redirect()->route('BuyForm.main')->with('success', 'Compra confirmada con éxito');
    }
}

