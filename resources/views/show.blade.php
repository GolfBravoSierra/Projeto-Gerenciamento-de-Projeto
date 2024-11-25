@extends('components.profilelayout')
@extends('components.layout')


@section('content')
    @section('profilenav')
    <img src="/img/profile_pictures/{{ $user->image }}">
    <form action="/register" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Profile picture:</label>
            <input type="file" id="image" name="image" class="from-control-file">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Alterar foto</button>
    </form>
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
    @endsection
@endsection
