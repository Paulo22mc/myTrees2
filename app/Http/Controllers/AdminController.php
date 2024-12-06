<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function showMainView()
    {
       
        $friends = 10; 
        $availableTrees = 20; 
        $treeSold = 15; 

        return view('layoutAdmin.main', compact('friends', 'availableTrees', 'treeSold'));
    }
}
