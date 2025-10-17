<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifier si l'administrateur est authentifié
        if(!session('admin_logged_in')){
            // Rediriger vers la page de connexion administrateur
            return redirect()->route('admin.login')->with('error', 'Veuillez vous connecter en tant qu\'administrateur pour accéder à cette page.');
        }
                             
        return $next($request);
    }
}
