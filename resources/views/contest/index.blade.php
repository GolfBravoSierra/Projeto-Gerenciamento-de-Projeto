@extends('components.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Campeonatos oferecidos:</h2>
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
                                <a class="btn btn-primary btn-block" href="contest/{{ $contest->id }}">Participar</a>
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