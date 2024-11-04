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
            'question_text' => 'required|string|max:1000',
            'correct_answer' => 'required|integer',
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
        return redirect('/contest/'.$question->contest->id)->with('sucesso', 'Parabéns, você terminou o campeonato!');
    }
}