<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // Allow access to the route
        }

        // If not an admin, return an unauthorized response or redirect
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
