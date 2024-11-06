@extends('components.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Histórico de campeonatos:</h2>
            </div>
            <div class="card-body">
                @if ($user->contests->count() > 0)
                    @foreach ($user->contests as $contest)
                        @if($contest->status == 0)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <p class="card-title">{{ $contest->title }}</p>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $contest->description }}</p>
                                    <p class="card-text">Data de início: {{ $contest->begin_date }}</p>
                                    <p class="card-text">Duração: {{ $contest->duration() }}</p>
                                    <p class="card-text">Ranking: {{ $contest->mode }}</p>
                                    <p class="card-text">Pontuação: {{ $user_contests->where('contest_id', $contest->id)->first()->points }}</p>
                                    @if($user_contests->where('contest_id', $contest->id)->first()->team_id)
                                        <p class="card-text">Competiu na equipe: {{ App\Models\Team::find($user_contests->where('contest_id', $contest->id)->first()->team_id)->name }}</p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p class="card-text">Nenhum campeonato até o momento.</p>
                @endif
            </div>
        </div>
    </div>
@endsection