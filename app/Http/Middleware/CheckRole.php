<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user && $user->role == $role) {
            return $next($request);
        }

        return redirect('/'); // Puedes redirigir a una página de acceso no autorizado o personalizar según tus necesidades.
    }
}
