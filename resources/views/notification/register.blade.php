@extends('components.layout')

@section('content')
    <div class="container">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="w-50">
                <h2 class="text-center mb-4">Convite para Equipe</h2>
                <form action="/contest/register" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                    @foreach($teams as $team)
                        <label for="title">Equipe</label>
                        <input type="dropdown" id="name" class="form-control" name="name">
                    @endforeach
                    </div>
                    <div class="form-group mb-3">
                        @foreach($users as $user)
                            <label for="title">Mandar Convite para</label>
                            <input type="dropdown" id="user_id" class="form-control" name="user_id">
                        @endforeach
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Registrar">
                </form>
            </div>
        </div>
    </div>
@endsection