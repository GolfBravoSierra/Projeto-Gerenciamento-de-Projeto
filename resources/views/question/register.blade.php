@extends('components.layout')

@section('content')
<div class="container">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="w-50">
                <h2 class="text-center mb-4">Criação de Questão</h2>
                <form action="/question/register" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="question_text">Questão</label>
                        <textarea class="form-control" id="question_text" name="question_text" rows="4" cols="50"></textarea>
                    </div>
                    @for($i = 1; $i < 5; $i++)
                    <div class="form-group mb-3">
                        <label for="option_{{ $i }}">Alternativa {{ $i }}</label>
                        <input type="text" id="option_{{ $i }}" class="form-control" name="option_{{ $i }}">
                        <input type="hidden" name="value_{{ $i }}" value="{{ $i }}">
                    </div>
                    @endfor
                    <div class="form-group mb-3">
                        <label for="correct_answer">Alternativa Correta</label>
                        <select name="correct_answer" id="correct_answer">
                            @for($i = 1; $i < 5; $i++)
                            <option value="{{ $i }}">Alternativa {{ $i }}</option>
                            @endfor
                        </select>
                    <div class="form-group mb-3">
                        <label for="contest_id">Campeonato</label>
                        <select name="contest_id" id="contest_id">
                            @foreach($contests as $contest)
                            <option value="{{ $contest->id }}">{{ $contest->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Registrar">
                </form>
            </div>
        </div>
    </div>
@endsection