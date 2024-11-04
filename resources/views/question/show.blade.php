@extends('components.layout')

@section('content')
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
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

                    <!-- Formulário da Questão -->
                    <form action="/question/{{$question->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        
                        <!-- Texto da Questão -->
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900">{{ $question->question_text }}</h2>
                        </div>

                        <!-- Opções de Resposta -->
                        <div class="space-y-4">
                            @foreach($question->options as $index => $option)
                            <div class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                                <input type="radio" 
                                       name="answer" 
                                       value="{{ $index }}"
                                       id="option_{{ $index }}"
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                                <label for="option_{{ $index }}" 
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

                        <!-- Botão de Próxima -->
                        <div class="mt-8">
                            <button type="submit"
                                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                Próxima Questão
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection