<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show($id)
    {
        $question = Question::find($id);
        
        if (!$question) {
            abort(404);
        }

        $totalQuestion = Question::count();
        $currentQuestionNumber = Question::where('id', '<=', $id)->count();

        return view('question.show', compact('question', 'totalQuestion', 'currentQuestionNumber'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'answer' => 'required',
            'question_id' => 'required|exists:questions,id'
        ]);

        $nextQuestion = Question::where('id', '>', $request->question_id)
                               ->orderBy('id', 'asc')
                               ->first();

        if ($nextQuestion) {
            return redirect('/question/'.$nextQuestion->id);
        }

        $question = Question::find($request->question_id);
        return redirect('/contest/'.$question->contest->id);
    }
}