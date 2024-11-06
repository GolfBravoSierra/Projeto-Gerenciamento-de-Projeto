<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Contest;
use App\Models\Option;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('question/register',['contests' => Contest::all()->where('creator_id', auth()->user()->id)]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'question_text' => 'required|string|max:1000',
            'correct_answer' => 'required|integer',
            'points' => 'required|integer',
            'contest_id' => 'required|exists:contests,id',
        ]); 

        $question = Question::create($validatedData);

        $validatedData2 = $request->validate([
            'option_1' => 'required|string|max:255',
            'option_2' => 'required|string|max:255',
            'option_3' => 'required|string|max:255',
            'option_4' => 'required|string|max:255',
            'value_1' => 'required|integer',
            'value_2' => 'required|integer',
            'value_3' => 'required|integer',
            'value_4' => 'required|integer',
        ]);

        for($i=1; $i<=4; $i++){
            $option = new Option();
            $option->question_id = $question->id;
            $option->text = $validatedData2['option_'.$i];
            $option->value = $validatedData2['value_'.$i];
            $option->save();
        }

        return redirect('/')->with('sucesso','Questão criada com sucesso');
    }

    public function show(Question $question)
    {
        $totalQuestion = Question::where('contest_id', $question->contest->id)->count();
        $currentQuestionNumber = Question::where('contest_id', $question->contest->id)->where('id', '<=', $question->id)->count();

        return view('question.show', compact('question', 'totalQuestion', 'currentQuestionNumber'));
    }

    public function next(Request $request)
    {

        $request->validate([
            'question_id' => 'required|exists:questions,id'
        ]);

        $question = Question::find($request->question_id);
        $nextQuestion = Question::where('id', '>', $question->id)
                                ->where('contest_id', $question->contest->id)
                                ->orderBy('id', 'asc')
                                ->first();

        if ($nextQuestion) {
            return redirect('/question/'.$nextQuestion->id);
        }

        return redirect('/contest/'.$question->contest->id.'/standings')->with('sucesso', 'Parabéns, você terminou o campeonato!');
    }
}