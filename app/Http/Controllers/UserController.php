<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:users',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'phone' => $validatedData['phone'],
        ]);

        auth()->login($user);

        return redirect()->route('home');
    }
}