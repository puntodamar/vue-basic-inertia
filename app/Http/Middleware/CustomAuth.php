<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = 'user')
    {
        if (Auth::guard($guard)->guest()) {
            // Redirect to your admin login, with a flash error
            return redirect()
                ->route($guard.".login")
                ->with('error', 'Please login to continue.');
        }

        return $next($request);
    }
}
