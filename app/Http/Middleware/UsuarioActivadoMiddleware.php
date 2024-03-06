<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UsuarioActivadoMiddleware
{
    const NOMBRE = 'UsuarioActivadoMiddleware';
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $usuarioLogeado = Auth::user();
        if (!$usuarioLogeado->estado) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            Auth::guard('api')->logout();
            throw UsuarioNoActivadoException::create();
        }

        return $next($request);
    }
}
