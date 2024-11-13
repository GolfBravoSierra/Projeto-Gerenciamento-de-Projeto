@extends('components.profilelayout')
@extends('components.layout')


@section('content')
    @section('profilenav')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Equipes</h2>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary btn-block" href="/teams/register">Criar Equipe</a>
                </div>
            </div>
            <div class="card-body">
                @if ($teams->count() > 0)
                    @foreach ($teams as $team)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <p class="card-title">{{ $team->name }}</p>
                                </h3>
                            </div>
                            <div class="card-body">
                                @foreach ($team->users as $user)
                                    <a class="fw-semibold text-decoration-none text-dark" href="/profile/{{$user->id}}">{{ $user->user_name }}</a>
                                @endforeach
                                <p class="card-text">Número de integrantes : {{ $team->users->count() }}</p>
                            
                                <div class="d-flex justify-content-start align-items-center">
                                    <form action="/invite" method="get" class="me-2">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-person-plus-fill"></i>
                                        </button>
                                    </form>
                                    <form action="/teams" method="post">
                                        @csrf
                                        <input type="hidden" name="team_id" id="team_id" value="{{$team->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="card-text">Nenhuma equipe até no momento.</p>
                @endif
            </div>
        </div>
    </div>
    @endsection
@endsection