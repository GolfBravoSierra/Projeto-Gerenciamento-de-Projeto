<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('/register');
    }
    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);
        
        $user = User::create($validatedData);

        return redirect('/register')->with('sucesso', 'Usuário cadastrado com sucesso');
    }

    public function show(User $user)
    {
        
        return view('/show',['user' => $user]);
    }
}
