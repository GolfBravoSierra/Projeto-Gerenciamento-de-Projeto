<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($attributes)){
            request()->session()->regenerate();
            return redirect('/')->with('sucesso', 'Usuário autenticado com sucesso');
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('password');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(): RedirectResponse
    {
        Auth::logout();

        return redirect('/')->with('sucesso', 'Usuário saiu com sucesso');
    }
}
