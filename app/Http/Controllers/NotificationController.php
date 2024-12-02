<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notification/index', ['notifications'=>Notification::all()->where('user_id','=',Auth::user()->id), 'user'=>auth()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('notification/register', ['teams'=>$user->teams,'users'=>User::all()->where('id','!=',$user->id)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'team_id' => 'required|exists:teams,id',
            'user_id' => 'required|exists:users,id',
        ]);
    
        $user = Auth::user();
        $team = Team::findOrFail($request->team_id);
        $notification = Notification::create([
            'title' => $team->name,
            'description' => 'Voce foi convidado para a equipe '.$team->name.' por '.$user->user_name,
            'user_id' => $request->user_id,
            'sender_id' => $user->id,
            'team_id' => $request->team_id,
        ]);

        return back()->with('sucesso','Convite enviado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $notification = Notification::findOrFail($request->notification_id);
        $notification->delete();
        return back()->with('sucesso','Convite Recusado');
    }
}
