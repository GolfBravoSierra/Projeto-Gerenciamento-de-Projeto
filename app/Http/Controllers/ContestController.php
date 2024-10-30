<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contest;
use App\Models\UserContest;
use App\Models\TeamContest;


class ContestController extends Controller
{
    public function index()
    {
        return view('contest/index', ['contests'=>Contest::
            filter(request(['search', 'contest']))
            ->paginate(10)->withQueryString(),
    ]);
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
            'mode' => 'required|integer|min:1|max:4',
            'begin_date' => 'required|date',
            'end_date' => 'required|date',

        ]); 

        $validatedData['created_by'] = $validatedData['created_by'] ?? Auth::user()->user_name;


        $contest = Contest::create($validatedData);

        return redirect('/')->with('sucesso','Campeonato criado com sucesso');
    }

    public function show(Contest $contest)
    {
        return view('contest/show',['contest' => $contest]);
    }

    public function registerUser(Contest $contest)
    {
        UserContest::create([
            'user_id'=>Auth::user()->id,
            'contest_id'=>$contest->id,
        ]);

        return back()->with('sucesso','Usuário registrado no campeonato com sucesso');
    }

    public function registerTeam(Request $request, Contest $contest)
    {
        TeamContest::create([
            'team_id'=>$request->team_id,
            'contest_id'=>$contest->id,
        ]);

        return back()->with('sucesso','Equipe registrada no campeonato com sucesso');
    }
}
