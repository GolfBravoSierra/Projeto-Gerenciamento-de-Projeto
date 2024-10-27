@extends('components.layout')

@section('content')
    <div class="container">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="w-50">
                <h2 class="text-center mb-4">Convite para Equipe</h2>
                <form action="/contest/register" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Nome da Equipe</label>
                        <input type="text" id="title" class="form-control" name="title">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Registrar">
                </form>
            </div>
        </div>
    </div>
@endsection