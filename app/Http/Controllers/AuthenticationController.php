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
    /**
     * Summary of authenticate
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

      
            $user = Auth::user();

            if ($user->role === 'administrator') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'operator') {
                return redirect()->route('operator.dashboard'); 
            } elseif ($user->role === 'friend') {
                return redirect()->route('friend.dashboard'); 
            }

            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Rol no válido.']);
        }

        
        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no coinciden con nuestros registros.',
        ]);
    }


    // Manejar el logout 
    /**
     * Summary of logout
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión
    
        // Invalida la sesión actual
        $request->session()->invalidate();
    
        // Regenera el token CSRF
        $request->session()->regenerateToken();
    
        // Redirige al usuario a la página principal
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
