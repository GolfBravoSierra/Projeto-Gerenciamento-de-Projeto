<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questões Corretas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                                                <td>{{ $submission->question->title ?? 'N/A' }}</td>
                                                <td>{{ $submission->question->contest->name ?? 'N/A' }}</td>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>