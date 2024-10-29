@extends('components.layout')

@section('content')
    <div class="container">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="w-50">
                <h2 class="text-center mb-4">Convite para Equipe</h2>
                <form action="/invite" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="team_id">Equipe</label>
                        <select name="team_id" id="team_id">
                            <option value="">-- Nenhum Time Selecionado --</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                            <label for="user_id">Mandar Convite para</label>
                            <select name="user_id" id="user_id">
                            <option value="">-- Nenhum Usuário Selecionado --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Enviar Convite">
                </form>
            </div>
        </div>
    </div>
@endsection