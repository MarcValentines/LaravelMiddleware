<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Necesario para acceder al usuario

class CheckUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si hay un usuario autenticado
        if (Auth::check()) {
            // Revisa si el usuario no está activo
            if (!Auth::user()->is_active) {
                // Redirige al inicio con un mensaje de error
                return redirect('/')->with('error', 'Tu cuenta no está activa.');
            }
        }

        // Si todo está bien, deja continuar la petición
        return $next($request);
    }
}
