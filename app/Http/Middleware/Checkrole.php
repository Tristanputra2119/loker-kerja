<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Ensure the user is authenticated and has the required role
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Redirect if the user lacks the correct role
        return redirect()->route('home')->with('error', 'Unauthorized access.');
    }
}
