<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landpage</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div>
        <div class="art-title">
            <h2 class="card-title">Campeonatos oferecidos:</h2>
            <br>
        </div>
        <div class="art-form">
            @if ($contests->count()>0)
            <div>
                @foreach ($contests as $contest)
                <div>
                    <div class="card">
                    <h3 class="card-header">
                        <a href="contest/{{ $contest->id }}">{{ $contest->name }}</a>
                    </h3>
                    <div class="card-body">
                        <p class="card-text">{{ $contest->description }}</p>
                    </div>
                    <div class="card-foot">
                        <a href="/contest/{{ $contest->id }}" class="card-text" style="background-color:red;color:white">Register >></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="pagination">{{ $contests->links() }}
        @else
        <p class="text center">Sem campeonatos registrados por enquanto. Volte mais tarde.</p>
        @endif
        </div>
        </div>
    </div>
</body>
