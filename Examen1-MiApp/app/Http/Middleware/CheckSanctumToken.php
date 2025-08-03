<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSanctumToken
{
    public function handle(Request $request, Closure $next): Response
    {
        // Para rutas API, verificar el token Bearer
        if ($request->is('api/*')) {
            if (!$request->bearerToken()) {
                return response()->json(['message' => 'Unauthenticated'], 401);
            }
        }
        
        return $next($request);
    }
}