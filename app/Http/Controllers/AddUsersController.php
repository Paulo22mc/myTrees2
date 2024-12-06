<?php

namespace App\Http\Controllers;

use App\Models\AddUsers;
use App\Models\User;
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

    public function show()
    {
        // Obtener usuarios con roles 'operator' y 'administrator'
        $users = User::whereIn('role', ['operator', 'administrator'])->get();

        return view('AddUsers.show', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('AddUsers.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'role' => 'required|in:administrator,operator',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect('/users')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
