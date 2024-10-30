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
                        <a class="nav-link" href="/history">Histórico de Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/notifications">Notificações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teams">Times</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Informações do Usuário</h1>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-person-fill me-2"></i>
                    <p class="mb-0 fw-semibold pe-1 fs-6">Nome </p>
                    <p class="mb-0">{{ $user->user_name }}</p>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-envelope me-2"></i>
                    <p class="mb-0 fw-semibold pe-1 fs-6">Email </p>
                    <p class="mb-0">{{ $user->email }}</p>
                </div>
                <!-- Adicione mais informações conforme necessário -->
            </div>
        </div>
    </div>

</div>
@endsection
