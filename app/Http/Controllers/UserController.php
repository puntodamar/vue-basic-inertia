<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return inertia("User/Create");
    }

    public function store(UserRequest $request){
        $user = User::create($request->validated());

        Auth::login($user, true);
        return redirect()->route("listings.index")->with("success", "You are now registered");
    }
}
