@extends('components.layout')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: flex-start; padding: 20px;">
        @if(auth()->user()->id == $user->id)
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between">
                <H2 class="navbar-brand">{{$user->user_name}}</H2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/history"><i class="bi bi-clock-history"></i> Histórico de Campeonatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/notifications">
                                @if(auth()->user()->notifications->isEmpty())
                                    <i class="bi bi-envelope-fill pt-1"></i>
                                @else
                                    <i class="bi bi-envelope-exclamation-fill pt-1"></i>
                                @endif
                             Notificações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/teams"><i class="bi bi-people-fill"></i> Times</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/submissions/correct"><i class="bi bi-check-circle-fill"></i> Questões Resolvidas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endif
    </div>
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