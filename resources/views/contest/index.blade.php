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
            <div class="row row-cols-1 row-cols-md-2 g-4" style="max-width: 72rem">
                @foreach ($contests as $contest)
                <div class="col-sm-6">
                    <div class="card">
                    <h3 class="card-header">
                        <a href="contest/{{ $contest->id }}">{{ $contest->name }}</a>
                    </h3>
                    <div class="card-body">
                        <p class="card-text">{{ $contest->description }}</p>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <div class="pagination">{{ $contests->links() }}
            @else
            <p class="text center">Sem campeonatos registrados por enquanto. Volte mais tarde.</p>
            @endif
            @yield('curso-card')
            </div>
        </div>
    </div>
</body>
