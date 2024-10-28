@extends('components.layout')

@section('content')
<div style="display: flex; flex-direction: column; align-items: flex-start; padding: 20px;">
    @if(auth()->user()->id == $user->id)
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <H2>{{$user->user_name}}</H2>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/history">Histórico de Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $user->id }}/notifications">Notificações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teams">Times</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif
    <div style="margin-bottom: 20px;">
        <h1>Informações do Usuário</h1>
        <p>Nome: {{ $user->user_name }}</p>
        <p>Email: {{ $user->email }}</p>
        <!-- Adicione mais informações conforme necessário -->
    </div>

</div>
@endsection
