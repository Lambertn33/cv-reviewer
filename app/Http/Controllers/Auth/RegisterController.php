<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class RegisterController extends Controller
{
    public function create(): Response
    {
        return inertia('auth/Register');
    }

    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:9|confirmed'
        ]));
        Auth::login($user);
        return redirect()->route('resume.upload.create');
    }
}