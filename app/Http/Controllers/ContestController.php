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

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'mode' => 'required|string|max:255',
            'begin_date' => 'required|date',
            'end_date' => 'required|date',

        ]); 

        $validatedData['created_by'] = $validatedData['created_by'] ?? 'A';


        $contest = Contest::create($validatedData);

        return redirect('/')->with('Campeonato criado com sucesso');
    }
}
