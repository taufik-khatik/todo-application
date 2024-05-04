<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmployeeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is not an admin (assuming 'admin' role is set to admins)
        if (auth()->check() && auth()->user()->role === 'employee') {
            return $next($request); // Allow access to the route for employees
        }

        // If admin or not authenticated, return an unauthorized response or redirect
        return redirect()->route('home')->with('error', 'Unauthorized access');
    }
}
