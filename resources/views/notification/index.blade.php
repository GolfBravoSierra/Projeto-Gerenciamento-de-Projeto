@extends('components.layout')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Notificações</h2>
            </div>
            <div class="card-body">
                @if ($notifications->count() > 0)
                    @foreach ($notifications as $notification)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <p class="card-title">Convite para equipe {{ $notification->title }}</p>
                                </h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $notification->description }}</p>
                                <div class="d-flex justify-content-start align-items-center">
                                    <form action="/teams/register-user" method="post" class="me-2">
                                        @csrf
                                        <input type="hidden" name="team_id" id="team_id" value="{{$notification->team_id}}">
                                        <input type="hidden" name="notification_id" id="notification_id" value="{{$notification->id}}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-person-fill-check"></i>
                                        </button>
                                    </form>
                                    <form action="/notifications" method="post">
                                        @csrf
                                        <input type="hidden" name="notification_id" id="notification_id" value="{{$notification->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-person-fill-x"></i>
                                        </button>
                                    </form>  
                                </div>
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