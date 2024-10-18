<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;

class ContestController extends Controller
{
    public function index()
    {
        return view('contest/index', ['contests'=>Contest::all()]);
    }

    public function create()
    {
        return view('contest/register');
    }
    public function store(Request $request)
    {
        /* $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]); */

        $contest = Contest::create($request);

        return redirect('/register')->with('success', 'Contest is successfully saved');
    }
}
