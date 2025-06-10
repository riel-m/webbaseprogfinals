<?php

use App\Http\Controllers\adoptionplancontroller;
use App\Http\Controllers\animalscontroller;
use App\Http\Controllers\centrecontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\profilecontroller;
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

// Profile
Route::get('/profile', [profilecontroller::class, 'index'])->middleware('auth')->name('profile');

// Animals
Route::get('/animals', [animalscontroller::class, 'index']);
Route::post('/animals', [animalscontroller::class, 'store']);
Route::get('/animals/create', [animalscontroller::class, 'create'])->middleware('role_admin');
Route::get('/animals/{animals_id}', [animalscontroller::class, 'show']);
Route::get('/animals/{animals_id}/edit', [animalscontroller::class, 'edit'])->middleware('role_admin');
Route::put('/animals/{animals_id}', [animalscontroller::class, 'update']);
Route::delete('/animals/{animals_id}', [animalscontroller::class, 'destroy'])->middleware('role_admin');
Route::post('/animals/{animal}/adopt', [adoptionplancontroller::class, 'store'])->name('adoptionplan.store')->middleware('auth');

// Centres
Route::get('/centre/create', [centrecontroller::class, 'create'])->middleware('role_admin');
Route::get('/centre', [centrecontroller::class, 'index']);
Route::post('/centre', [centrecontroller::class, 'store']);
Route::get('/centre/{centre_id}', [centrecontroller::class, 'show']);
Route::get('/centre/{centre_id}/edit', [centrecontroller::class, 'edit']);
Route::put('/centre/{centre_id}', [centrecontroller::class, 'update']);
Route::delete('/centre/{centres}', [centrecontroller::class, 'destroy'])->middleware('role_admin');
