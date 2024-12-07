<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\treeForSale;

class AdminController extends Controller
{
    //

    public function showMainView()
    {

        $totalFriends = User::where('role', 'friend')->count();
        $totalAvailableTrees = treeForSale::where('status', 'available')->count();
        $totalSoldTrees = treeForSale::where('status', 'sold')->count();


        return view('layoutAdmin.main', compact('totalFriends', 'totalAvailableTrees', 'totalSoldTrees'));
    }
}
