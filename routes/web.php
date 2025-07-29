<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

//Route::get('/', function () {
//    return inertia('Index');
////    return view('app');
//});

Route::get('/', [IndexController::class, 'index']);
Route::get('/show', [IndexController::class, 'show']);

//Route::resource('listings', ListingController::class)->only(['index', 'show', 'create', 'store']);
Route::resource('listings', ListingController::class);
