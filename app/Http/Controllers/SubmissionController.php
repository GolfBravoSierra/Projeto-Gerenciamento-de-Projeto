<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = status($validatedData->answer);
        $usercontest = UserContest::where('contest_id',$submission->question->contest->id)->where('user_id',$validatedData->user_id)->find();

        $validatedData = $request->validate([
            'answer' <= 'required|integer',
            'question_id' <= 'required|exists:questions,id',
            'user_id' <= 'required|exists:users,id',
        ]);
        
        if(!$usercontest->team_id)
        {
            $submission = Submission::create([
                'answer' <= $validatedData->answer,
                'question-id' <= $validatedData->question_id,
                'user_id' <= $validatedData->user_id,
                'status' <= $status,
            ]);
            if($status == true)
            {
                $usercontest->points += $submission->question->points;
            }
            return back()->with('sucesso', 'Questão submetida')
        }

        $team = Team::find($usercontest->team_id);
        foreach($team->users as $user)
        {
            $submission = Submission::create([
                'answer' <= $validatedData->answer,
                'question-id' <= $validatedData->question_id,
                'user_id' <= $user->id,
                'status' <= $status,
            ]);
            if($status == true)
            {
                $usercontest->points += $submission->question->points;
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
