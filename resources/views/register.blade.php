@extends('components.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="w-50">
            <h2 class="text-center mb-4">Registro de Usuário</h2>
            <form action="/register" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="user_name">Nome</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <small class="error">**{{ $message }}**</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @error('password')
                        <small class="error">**{{ $message }}**</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirme a Senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                        <small class="error">**{{ $message }}**</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Foto de perfil</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form>
        </div>
    </div>
@endsection