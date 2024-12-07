<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\treeForSale;

class SeeMyTreesController extends Controller
{
    public function seeMyTrees()
{
    $user = Auth::user();

    // Verificar si el usuario tiene un rol de 'administrator'
    if ($user->role === 'administrator') {
        return redirect()->route('accessDenied');  // Redirigir si es un administrador
    }

    // Consulta a la base de datos para obtener los árboles del usuario logueado
    $trees = DB::table('tree')  // Cambié 'trees' por 'tree' para que coincida con el nombre de tu tabla
        ->join('treeSpecie', 'tree.idSpecie', '=', 'treeSpecie.id')  // JOIN con treeSpecie
        ->join('users', 'tree.idFriend', '=', 'users.id')  // JOIN con users para obtener el nombre del usuario
        ->select(
            'tree.idSpecie',           // El id de la especie del árbol
            'tree.idFriend',           // El id del amigo que compró el árbol
            'tree.ubication',          // Ubicación del árbol
            'tree.status',             // Estado del árbol
            'tree.size',               // Tamaño del árbol
            'tree.price',              // Precio del árbol
            'tree.photo',              // Foto del árbol
            'treeSpecie.commercialName',  // Nombre comercial de la especie
            'users.name as friendName'     // Nombre del amigo que compró el árbol
        )
        ->where('tree.idFriend', $user->id)  // Filtrar solo los árboles comprados por el usuario logueado
        ->get();

    // Pasar los datos de los árboles a la vista
    return view('seeyTrees.main', compact('trees'));
}

}
