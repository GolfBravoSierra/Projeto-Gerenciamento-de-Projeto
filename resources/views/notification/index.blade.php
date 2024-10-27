@extends('components.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Notificações:</h2>
            </div>
            <div class="card-body">
                @if ($notifications->count() > 0)
                    @foreach ($notifications as $notification)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <p class="card-title">{{ $notification->title }}</p>
                                </h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $notification->description }}</p>
                            </div>
                            <div>
                                <form action="/notifications" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-primary btn-block" value="Recusar">
                                </form>
                                <form action="/teams/register" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-primary btn-block" value="Aceitar">
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="card-text">Nenhuma notificação até no momento.</p>
                @endif
            </div>
        </div>
    </div>
@endsection