@extends('components.profilelayout')
@extends('components.layout')


@section('content')
    @section('profilenav')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h2 class="mb-0">Minhas Questões Corretas</h2>
                    </div>

                    <div class="card-body">
                        @if($submissions->isEmpty())
                            <div class="alert alert-info">
                                Você ainda não acertou nenhuma questão.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Questão</th>
                                            <th>Campeonato</th>
                                            <th>Pontos</th>
                                            <th>Sua Resposta</th>
                                            <th>Data de Submissão</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($submissions as $submission)
                                            <tr>
                                            <td><a href="/question/{{$submission->question->id}}" class="text-decoration-none" text="black">{{ $submission->question->name ?? 'N/A' }}</a></td>
                                                <td>{{ $submission->question->contest->title ?? 'N/A' }}</td>
                                                <td>{{ $submission->question->points ?? '0' }}</td>
                                                <td>{{ $submission->answer }}</td>
                                                <td>{{ $submission->created_at->format('d/m/Y H:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3 alert alert-success">
                                <strong>Total de Pontos Acumulados: </strong>
                                {{ $submissions->sum('question.points') }}
                            </div>
                        @endif

                        <div class="mt-3">
                            <a href="/profile/{{ auth()->id() }}" class="btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection