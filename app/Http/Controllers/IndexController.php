<?php

namespace App\Http\Controllers;
use App\Models\User;

class IndexController extends Controller {
    public function index() {

        return inertia('Index/Index', [
            "message" => "Hello from laravel",
            "users" => User::all()
        ]);
    }

    public function show() {
        return inertia('Index/Show');
    }
}
