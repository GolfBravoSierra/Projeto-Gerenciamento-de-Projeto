@extends('components.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="w-50">
            <h2 class="text-center mb-4">Nova Senha</h2>
            <form action="/reset-password" method="POST">
                @csrf
                <input type="hidden" name="token" id="token" value={{$token}}>
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
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
        </div>
    </div>
@endsection