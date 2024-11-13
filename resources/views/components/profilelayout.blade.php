<div style="display: flex; flex-direction: column; align-items: flex-start; padding: 20px;">
    @if(auth()->user()->id == $user->id)
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between">
            <a href="/profile/{{$user->id}}" style="text-decoration: none;"><h2 class="navbar-brand">{{$user->user_name}}</h2></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/history"><i class="bi bi-clock-history"></i> Histórico de Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/notifications">
                            @if(auth()->user()->notifications->isEmpty())
                                <i class="bi bi-envelope-fill pt-1"></i>
                            @else
                                <i class="bi bi-envelope-exclamation-fill pt-1"></i>
                            @endif
                         Notificações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teams"><i class="bi bi-people-fill"></i> Times</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/submissions/correct"><i class="bi bi-check-circle-fill"></i> Questões Resolvidas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif
@yield('profilenav')
</div>