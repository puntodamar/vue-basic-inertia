<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function create() {
        if (Auth::check()) {
            return redirect(route('listings.index'));
        }
        return inertia('Auth/Login');
    }

    public function store(Request $request) {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if(Auth::attempt($request->only("email", "password"), true)) {
            $request->session()->regenerate();
            return redirect()->intended(route('listings.index'))->with('success', "Welcome, ".Auth::user()->name);
        } else {
//            session()->flash('error', 'Invalid username/password');
            throw ValidationException::withMessages([
                'email' => 'The provided email do not match our records.',
                'password' => 'The provided password does not match our records.',
            ]);
        }


    }

    public function destroy(Request $request) {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect(route('listings.index'))->with('success', "You have been logged out.");
        } else {
            return redirect(route('listings.index'));
        }

    }
}
