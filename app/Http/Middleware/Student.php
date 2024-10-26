<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Student
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has the 'student' role
        if (Auth::check() && Auth::user()->hasRole('student')) {
            return $next($request); // User is a student, proceed with the request
        }

        // Optionally, redirect or abort if the user is not a student
        return redirect('/')->with('error', 'Access denied.');
    }
}
