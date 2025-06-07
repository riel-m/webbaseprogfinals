<?php

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
// Login || Logout Routes
Route::get('/login', [logincontroller::class, 'index'])->middleware('guest');
Route::post('/login', [logincontroller::class, 'authenticate']);
Route::post('/logout', [logincontroller::class, 'logout']);

// Register Routes
Route::get('/register', [registercontroller::class, 'index'])->middleware('guest');
Route::post('/register', [registercontroller::class, 'store']);
