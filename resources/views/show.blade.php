@extends('components.profilelayout')
@extends('components.layout')


@section('content')
    @section('profilenav')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Informações do Usuário</h1>
            </div>
            <div class="card-body">
                <img src="/img/profile_pictures/{{ $user->image }}" class="rounded-circle" alt="Foto de perfil" style="width: 150px; height: 150px;">
                <form action="/profile/{{ $user->id }}/updateImage" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Trocar foto de perfil</label>
                        <div class="d-flex align-items-center">
                            <input type="file" id="image" name="image" class="form-control">
                            <input type="hidden" id = "user_id" name = "user_id" value = "{{ $user->id }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-block">Alterar foto</button>
                </form>
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
