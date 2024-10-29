@extends('components.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Equipes:</h2>
                <a href="/teams/register">criar equipe</a>
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
                                    <p class="card-text">{{ $user->user_name }}</p>
                                @endforeach
                                <p class="card-text">Número de integrantes :{{ $team->users->count() }}</p>
                            </div>
                            <div>
                                <form action="/invite" method="get">
                                    @csrf
                                    <input type="submit" class="btn btn-primary btn-block" value="Convidar">
                                </form>
                                <form action="/teams" method="post">
                                    @csrf
                                    <input type="hidden" name="team_id" id="team_id" value="{{$team->id}}">
                                    <input type="submit" class="btn btn-close btn-block">
                                </form>
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