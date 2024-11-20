@extends('components.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="w-50">
            <h2 class="text-center mb-4">Esqueci minha Senha</h2>
            <form action="/forgot-password" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <small class="error">**{{ $message }}**</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
        </div>
    </div>
@endsection