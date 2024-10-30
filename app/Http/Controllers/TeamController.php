<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Team;
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
        $teams = Auth::user()->teams;

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
        $validatedData = $request->validate([
            'name' => 'required|string|unique:teams|max:255',
        ]);

        $user = Auth::user();
        $team = Team::create($validatedData);
        TeamUser::create([
            'team_id' => $team->id,
            'user_id' => $user->id,
        ]);

        return redirect('/teams')->with('sucesso','Equipe registrada com sucesso');

        
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
        $teamUser = TeamUser::where('team_id','=',$request->team_id)->where('user_id','=',Auth::user()->id)->first();
        $teamUser->delete();
        if(!TeamUser::where('team_id','=',$request->team_id)->where('user_id','=',Auth::user()->id)->first()){
            $team = Team::findOrFail($request->team_id);
            $team->delete();
        }
        
        return back()->with('sucesso','Equipe deletada com sucesso');
    }

    public function registerUser(Request $request)
    {
      
        $validatedData = $request->validate([
            'team_id'=>'required|exists:teams,id',
            'notification_id'=>'required|exists:notifications,id'
        ]);

        $user = Auth::user();
        TeamUser::create([
            'team_id' => $request->team_id,
            'user_id' => $user->id,
        ]);

        $notification = Notification::findOrFail($request->notification_id);
        $notification->delete();
        
        return back()->with('sucesso','Usuário adicionado na equipe com sucesso');
    }
}
