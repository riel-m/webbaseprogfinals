<?php

namespace App\Http\Controllers;

use App\Models\adoptionplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class profilecontroller extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $adoptionplan = $user->adoptionplan()->with('animal')->get();

        return view('profile', compact('adoptionplan'));
    }

    public function show() {}
}
