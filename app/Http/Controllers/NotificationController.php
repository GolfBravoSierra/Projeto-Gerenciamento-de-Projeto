<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notification/index', ['notifications'=>Notification::where('user_id'=>auth()->id)->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notification/register', ['teams'=>Team::where('user_id'=>auth()->id),'users'=>User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth();

        $data['title'] = $data['title'] ?? 'Convite para equipe {{$request->name}}';
        $data['description'] = $data['description'] ?? 'Voce foi convidado para a equipe {{$request->name}} por {{$user->user_name}}';
        $data['user_id'] = $data['user_id'] ?? $request->user_id;
        $data['sender_id'] = $data['sender_id'] ?? $user->id;

        $notification = Notification::create($data);

        return back()->with('sucesso','Convite criado')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        $notification = Notification::findOrFail($request->id);
        $notification->delete();
        return back()->with('sucesso','Convite Recusado');
    }
}
