@extends('components.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="w-50">
            <h2 class="text-center mb-4">Nos envie um E-mail</h2>
            <form action="/support" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Seu Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Seu e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    @error('email')
                        <small class="error">**{{ $message }}**</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="subject">Assunto</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="form-group mb-3">
                    <label for="message">Mensagem</label>
                    <textarea type="text" class="form-control" id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
        </div>
    </div>
@endsection