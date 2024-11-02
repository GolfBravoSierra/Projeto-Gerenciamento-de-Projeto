@extends('components.layout')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>{{ $contest->title }}</h3>
        </div>
        <div class="card-body">
            <p>{!! $contest->description !!}</p>
            <div class="mb-3">
                Modo do Campeonato: 
                @if($contest->mode == 1)
                    Individual
                @else
                    Equipes de {{$contest->mode}}
                @endif
            </div>
            <div class="mb-3">
                Criado por: <a href="/profile/{{ $contest->creator_id }}">{{ $contest->creator->user_name }}</a>
            </div>
            @auth
                @if(!$contest->users->where('id', auth()->user()->id)->first())
                    <form action="/contest/{{ $contest->id }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary btn-block" value="Register">
                    </form>
                    @if($contest->mode > 1)
                    <form action="/contest/{{ $contest->id }}/register-team" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary btn-block" value="Register as Team">
                        <label for="team_id">Equipe: </label>
                        <select name="team_id" id="team_id">
                            <option value="">-- Nenhuma Equipe Selecionada --</option>
                            @foreach(auth()->user()->teams as $team)
                                @if($team->users->count() <= $contest->mode)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </form>
                    @endif
                @endif
            @else
                <form action="/login" method="get">
                        @csrf
                        <input type="submit" class="btn btn-primary btn-block" value="Register">
                    </form>
            @endif
        </div>
        <div class="card-footer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Participantes</th>
                        <th scope="col"></th>
                        <th scope="col">Pontuação</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            @if($user->team_id)
                                <td>{{App\Models\Team::find($user->team_id)->name}}</td>
                            @endif
                            <td>{{App\Models\User::find($user->user_id)->user_name}}</td>
                            <td>{{$user->points}}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection