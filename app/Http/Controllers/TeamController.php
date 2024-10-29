<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\TeamUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all()->where('user_id','=',Auth::user()->id);

        return view('team/index', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('team/register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|unique:teams|max:255',
        ]);
        $team = Team::all()->where('name','=',$validatedData['name']);
        if(!$team){  
            $team = Team::create($validatedData);
            TeamUser::create([
                'team_id' => $team->id,
                'user_id' => $user->id,
            ]);

            return redirect('/teams')->with('sucesso','Equipe registrada com sucesso');
        }
        TeamUser::create([
            'team_id' => $team->id,
            'user_id' => $user->id,
        ]);
        
        return redirect('/teams')->with('sucesso','Usuário adicionado na equipe com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $team = Team::findOrFail($request->team_id);
        $team->delete();
        return back()->with('sucesso','Equipe deletada com sucesso');
    }
}
