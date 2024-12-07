<?php

namespace App\Http\Controllers;

use App\Models\treeForSale;
use App\Models\User;

class OperatorController extends Controller
{
    public function showMainView()
    {
        $totalFriends = User::where('role', 'friend')->count();
        $totalAvailableTrees = treeForSale::where('status', 'available')->count();

        return view('layoutOperator.main', compact('totalFriends', 'totalAvailableTrees'));
    }
}
