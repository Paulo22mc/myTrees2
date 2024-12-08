<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $userRole = Auth::user()->role;
    
        // Verifica si el rol del usuario está en la lista de roles permitidos
        if (!in_array($userRole, $roles)) {
            return redirect()->route('accessDenied');
        }
    
        return $next($request);
    }
    
}
