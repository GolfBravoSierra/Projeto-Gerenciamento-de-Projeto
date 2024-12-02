@extends('components.layout')

@section('content')
<div class="container mt-5">
    <div class="card">
                <div class="card-header">
                    <!-- Barra de Progresso -->
                        <div class="mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">
                                    Questão {{ $currentQuestionNumber }} de {{ $totalQuestion }}
                                </span>
                                <span class="text-sm font-medium text-gray-700">
                                    {{ floor(($currentQuestionNumber / $totalQuestion) * 100) }}%
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" 
                                    style="width: {{ ($currentQuestionNumber / $totalQuestion) * 100 }}%">
                                </div>
                            </div>
                        </div>
                        <!-- Texto da Questão -->
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900">{{ $question->name }}</h2>
                        </div>
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $question->question_text }}</h3>
                        </div>
                    </div>
                        <!-- Formulário da Questão -->
                        <div class="card-body">
                            <form action="/submit" method="POST">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">

                                <!-- Opções de Resposta -->
                                <div class="space-y-4">
                                    @foreach($question->options as $index => $option)
                                    <div class="flex items-center p-4">
                                        <input type="radio" 
                                            name="answer" 
                                            value="{{ $index+1 }}"
                                            id="option_{{ $index+1 }}"
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                        <label for="option_{{ $index+1 }}" 
                                            class="ml-3 block text-sm font-medium text-gray-700 cursor-pointer w-full">
                                            {{ $option->text }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Mensagem de Erro -->
                                @error('answer')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @auth
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="submit" class="btn btn-primary btn-block" value="Enviar Resposta">
                                @endauth
                            </form>
                            <!-- Botão de Próxima -->
                            <form action="/question/{{$question->id}}" method="POST">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <div class="mt-8">
                                    <button type="submit"
                                            class="btn btn-success">
                                        Próxima Questão
                                    </button>
                                </div>
                            </form>
                        </div>
        </div>
    </div>
</div>
@endsection