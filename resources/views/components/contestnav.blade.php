<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="/contest/{{$contest->id}}" aria-current="page"><H2 class="navbar-brand">{{$contest->title}}</H2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/question/{{$contest->questions[0]->id}}">Questões</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contest/{{$contest->id}}/standings">Classificação</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('contestnav')