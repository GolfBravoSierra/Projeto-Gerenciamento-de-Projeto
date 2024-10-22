<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Landpage</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Campeonatos oferecidos:</h2>
            </div>
            <div class="card-body">
                @if ($contests->count() > 0)
                    @foreach ($contests as $contest)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <p class="card-title">{{ $contest->title }}</p>
                                </h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $contest->description }}</p>
                                <a class="btn btn-primary btn-block" href="contest/{{ $contest->id }}">Participar</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="card-text">Nenhum campeonato disponível no momento.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>