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
                                    <p class="card-title"><i class="bi bi-trophy-fill"></i> {{ $contest->title }}</p>
                                </h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $contest->description }}</p>
                                <p class="card-text"><i class="bi bi-clock"></i><b> Duração</b> {{ $contest->duration() }} horas</p>
                                <p class="card-text"><i class="bi bi-award-fill"></i><b> Prêmio</b> {{ $contest->award ?? 'Campeonato não oferece premiação' }}</p>
                                @if($contest->status() > 1)
                                    @auth
                                        @if(auth()->user()->contests->contains($contest->id))  
                                            <a class="btn btn-info btn-block" href="contest/{{ $contest->id }}">Acompanhar</a>
                                        @else
                                            <a class="btn btn-primary btn-block" href="contest/{{ $contest->id }}">Participar</a>
                                        @endif
                                    @else
                                        <a class="btn btn-primary btn-block" href="contest/{{ $contest->id }}">Participar</a>
                                    @endif
                                @elseif($contest->status() == 1)
                                    <p class="card-text">O campeonato está em andamento. <a href="contest/{{ $contest->id }}" class="btn btn-info">Acompanhar</a></p>
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