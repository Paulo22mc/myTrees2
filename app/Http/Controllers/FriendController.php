<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    //Redirige a la vista principal
    public function showMainView()
    {
        return view('layoutFriend.main');
    }
}
