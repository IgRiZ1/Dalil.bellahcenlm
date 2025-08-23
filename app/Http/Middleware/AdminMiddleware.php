<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Controleer of gebruiker is ingelogd
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Controleer of gebruiker admin is
        if (!Auth::user()->isAdmin()) {
            abort(403, 'U heeft geen toegang tot deze pagina. Alleen beheerders kunnen deze functionaliteit gebruiken.');
        }

        return $next($request);
    }
}
