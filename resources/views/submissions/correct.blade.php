@extends('components.layout')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: flex-start; padding: 20px;">
        @if(auth()->user()->id == $user->id)
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between">
                <H2 class="navbar-brand">{{$user->user_name}}</H2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/history">Histórico de Campeonatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/notifications">Notificações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/teams">Times</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/submissions/correct">Questões Resolvidas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endif
    </div>
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
                                                <td>{{ $submission->question->name ?? 'N/A' }}</td>
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