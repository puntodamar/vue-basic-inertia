<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/show', [IndexController::class, 'show']);


Route::middleware(['custom.auth:user'])->group(function () {
    Route::resource('listings', ListingController::class)->only(['create', 'store','destroy', 'edit']);
    Route::resource('listings', ListingController::class)->only(['index', 'show'])->withoutMiddleware(['custom.auth:user']);
});


Route::resource('users', UserController::class);


Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');


