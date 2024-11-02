<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contest;
use App\Models\Team;
use App\Models\UserContest;


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

        $validatedData['creator_id'] = $validatedData['creator_id'] ?? Auth::user()->id;


        $contest = Contest::create($validatedData);

        return redirect('/')->with('sucesso','Campeonato criado com sucesso');
    }

    public function show(Contest $contest)
    {
        $users = UserContest::all()->where('contest_id',$contest->id);
        return view('contest/show',['contest' => $contest, 'users' =>$users]);
    }

    public function registerUser(Contest $contest)
    {
        $user_contest = UserContest::create([
            'user_id'=>Auth::user()->id,
            'contest_id'=>$contest->id,
        ]);

        return back()->with('sucesso','Usuário registrado no campeonato com sucesso');
    }

    public function registerTeam(Request $request, Contest $contest)
    {
        $team = Team::find($request->team_id);
        foreach($team->users as $user){
            $team_contest = UserContest::create([
                'user_id'=>$user->id,
                'contest_id'=>$contest->id,
                'team_id'=>$request->team_id,
            ]);
        }

        return back()->with('sucesso','Equipe registrada no campeonato com sucesso');
    }
}
