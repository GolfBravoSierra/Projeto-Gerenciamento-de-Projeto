<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="w-50">
            <h2 class="text-center">Login de Usuário</h2>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">E-mail:</label>
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
                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>