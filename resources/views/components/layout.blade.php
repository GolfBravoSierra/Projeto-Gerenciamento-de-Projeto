<head>
    <title>Contest-Manager</title>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

  <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" aria-current="page">Contest-Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/notifications">
                                @if(auth()->user()->notifications->isEmpty())
                                    <i class="bi bi-envelope-fill pt-1"></i>
                                @else
                                    <i class="bi bi-envelope-exclamation-fill pt-1"></i>
                                @endif
                            </a>
                        </li>
                        @auth
                            @if(auth()->user()->role >= 1)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="triggercontest" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Campeonatos
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="triggercontest">
                                        <li><a class="dropdown-item" href="/contest/register">Registrar novo campeonato</a></li>
                                        <li><a class="dropdown-item" href="/question/register">Criar nova questão</a></li>
                                    </ul>
                                </li>
                            @endif
                        @endauth
                        <img src="/img/profile_pictures/{{ auth()->user()->image }}">
                        <li class="nav-item">
                            <a class="nav-link" href="/profile/{{ auth()->user()->id }}">{{ auth()->user()->user_name }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Sair</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Registrar-se</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="/support">Contate-nos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @if (session()->has('sucesso'))
        <div x-data="{show:true}"
            x-init="setTimeout(()=>show=false,5000)"
            x-show="show">
        <p class="alert alert-info">{{ session()->get('sucesso') }}</p>
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    @yield('content')
    
</body>