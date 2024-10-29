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
        return view('notification/index', ['notifications'=>Notification::all()->where('user_id','=',Auth::user()->id)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notification/register', ['teams'=>Team::all()->where('user_id','=',Auth::user()->id),'users'=>User::all()->where('id','!=',Auth::user()->id)]);
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
        $data['title'] = $data['title'] ?? $team->name;
        $data['description'] = $data['description'] ?? 'Voce foi convidado para a equipe '.$team->name.' por '.$user->user_name;
        $data['user_id'] = $data['user_id'] ?? $request->user_id;
        $data['sender_id'] = $data['sender_id'] ?? $user->id;

        $notification = Notification::create($data);

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
