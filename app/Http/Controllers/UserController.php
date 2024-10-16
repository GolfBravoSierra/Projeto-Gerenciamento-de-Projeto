<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            #'password' => 'required|string',
        ]);
        
        $user = User::create($validatedData);

        return redirect('/register')->with('success', 'User is successfully saved');
    }
}
