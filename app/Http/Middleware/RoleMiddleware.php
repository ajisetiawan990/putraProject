<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Kalau belum login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Kalau role tidak sesuai
        if (Auth::user()->role !== $role) {
            abort(403, 'AKSES DITOLAK');
        }

        return $next($request);
    }
}
