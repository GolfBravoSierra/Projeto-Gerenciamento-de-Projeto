<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\UserContest;
use App\Models\Team;
use App\Models\Question;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()  // Removido o parâmetro $user_id
    {
        $user = auth()->user(); // Pega o ID do usuário logado
        
        $submissions = Submission::where('user_id', $user->id)
            ->where('status', true)
            ->with(['question.contest']) // Adicionado .contest para carregar também o relacionamento com o campeonato
            ->get();

        return view('submissions.correct', compact('submissions', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'answer' => 'required|integer',
            'question_id' => 'required|exists:questions,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $question = Question::find($request->question_id);
        $usercontest = UserContest::all()->where('contest_id',$question->contest->id)->where('user_id',$request->user_id)->first();

        if(!$usercontest->team_id)
        {
            $submission = Submission::create([
                'answer' => $request->answer,
                'question_id' => $request->question_id,
                'user_id' => $request->user_id,
            ]);

            $submission->status();
            if($submission->question->contest->status() == 1){
                $submission->assignPoints($usercontest);
            }
            return back()->with('sucesso', 'Questão submetida');
        }

        $team = Team::find($usercontest->team_id);
        foreach($team->users as $user)
        {
            $submission = Submission::create([
                'answer' => $request->answer,
                'question_id' => $request->question_id,
                'user_id' => $user->id,
            ]);
            $submission->status();
            $usercontest = UserContest::all()->where('contest_id',$question->contest->id)->where('user_id',$user->id)->first();
            if($submission->question->contest->status() == 1){
                $submission->assignPoints($usercontest);
            }
        }
        return back()->with('sucesso', 'Questão submetida para toda a equipe');
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }
}