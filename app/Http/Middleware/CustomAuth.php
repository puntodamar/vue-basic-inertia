<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuth
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string    $guard   // this is your middleware param: 'user' or 'admin'
     */
    public function handle(Request $request, Closure $next, string $guard = 'user')
    {
        if (Auth::check()) {
            return $next($request);
        } else {
            return redirect()
                ->route('login')
                ->with('error', 'You must be logged in to access that page.');
        }


    }
}
