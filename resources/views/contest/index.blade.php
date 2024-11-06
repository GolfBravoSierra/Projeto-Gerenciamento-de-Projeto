@extends('components.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Campeonatos oferecidos</h2>
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
                                <p class="card-text">Duração: {{ $contest->duration() }} horas</p>
                                @if($contest->status() > 1)
                                    <a class="btn btn-primary btn-block" href="contest/{{ $contest->id }}">Participar</a>
                                @elseif($contest->status() == 1)
                                    <p class="card-text">O campeonato está em andamento. <a href="contest/{{ $contest->id }}">Acompanhar</a></p>
                                @else
                                    <p class="card-text">Campeonato acabado.</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="card-text">Nenhum campeonato disponível no momento.</p>
                @endif
            </div>
        </div>
    </div>
@endsection