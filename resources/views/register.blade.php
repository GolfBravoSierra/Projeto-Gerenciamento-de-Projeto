@extends('components.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="w-50">
            <h2 class="text-center">Registro de Usuário</h2>
            <form action="/register" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-floating">
                        <label for="user_name">Nome</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <small class="error">**{{ $message }}**</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <small class="error">**{{ $message }}**</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form>
        </div>
    </div>
@endsection