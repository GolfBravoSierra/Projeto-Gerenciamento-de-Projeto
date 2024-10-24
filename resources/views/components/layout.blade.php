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
</head>
<body>
    <nav class="nav justify-content-space-between navbar-light bg-light">
        <a class="nav-link active" href="/" aria-current="page"><h1>Contest-Manager</h1><span class="visually-hidden">(current)</span></a>
        <div class="navbar nav">
            <div class="nav-links">
                @auth
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="triggercontest" data-bs-toggle="dropdown" aria-haspopup="true" 
                        aria-expanded="false"><h6>Campeonatos</h6></button>
                        <div class="dropdown-menu" aria-labelledby="triggercontest">
                            <a class="dropdown-item" href="/contests/register">Registrar novo campeonato</a>
                        </div>
                    </div>
                    <a class="nav-link active" href="/profile" aria-current="page"><h6>{{auth()->user()->user_name}}</h6></a>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit"><h6>Sair</h6></button>
                    </form>
                @else
                    <a class="nav-link active" href="/register" aria-current="page"><h6>Register</h6></a>
                    <a class="nav-link active" href="/login" aria-current="page"><h6>Login</h6></a>
                @endif
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    @yield('content')
</body>