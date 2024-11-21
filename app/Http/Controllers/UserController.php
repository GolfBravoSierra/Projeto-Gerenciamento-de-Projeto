<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserContest;
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
            'role' => 'required|integer',
            'password' => 'required|string|confirmed',
        ]);
        
        $user = User::create($validatedData);

        return redirect('/register')->with('sucesso', 'Usuário cadastrado com sucesso');
    }

    public function show(User $user)
    {
        
        return view('/show',['user' => $user]);
    }

    public function history()
    {
        $user = Auth::user();
        $user_contests = UserContest::all()->where('user_id', $user->id);
        return view('/history',['user' => $user, 'user_contests' => $user_contests]);
    }
}