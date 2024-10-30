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
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <p class="card-title">{{ $contest->title }}</p>
                                </h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $contest->description }}</p>
                                <p class="card-text">Data de início: {{ $contest->begin_date }}</p>
                                <p class="card-text">Data de término: {{ $contest->end_date }}</p>
                                <p class="card-text">Ranking: {{ $contest->mode }}</p>

                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="card-text">Nenhum campeonato até o momento.</p>
                @endif
            </div>
        </div>
    </div>
@endsection