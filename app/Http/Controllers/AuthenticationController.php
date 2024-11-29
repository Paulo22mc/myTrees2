<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Manejar el login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard');
        }

        // Si la autenticación falla
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    // Manejar el logout (cerrar sesión)
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('register');
    }

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
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'number' => $request->number,
            'address' => $request->address,
            'country' => $request->country,
            'role' => 'friend',  
        ]);

        return redirect()->route('login')->with('status', 'registered');

    }
}
