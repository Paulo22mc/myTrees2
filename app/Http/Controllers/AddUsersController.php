<?php

namespace App\Http\Controllers;

use App\Models\AddUsers;
use Illuminate\Http\Request;

class AddUsersController extends Controller
{
    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'number' => 'required|string|max:15',
            'address' => 'required|string|max:100',
            'country' => 'required|string|max:255',
            'role' => 'required|string|in:administrator,operator,friend',
        ]);

        $user = AddUsers::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'number' => $request->number,
            'address' => $request->address,
            'country' => $request->country,
            'role' => $request->role,
        ]);

        return redirect()->route('AddUsers.main')->with('status', 'registered');
    }


    public function addUsers()
    {
        return view('AddUsers.main');
    }
}
