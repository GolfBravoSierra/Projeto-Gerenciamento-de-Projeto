<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Contest</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
</head>
<body>
    <div>
        <h3>
            {{$contest->name}}
        </h3>
    </div>
    <div>
        <p>{!! $contest->description !!}</p>
        <br>
        <div >
            Criado por: <a href="/?user={{ $contest->created_by }}#">{{ $contest->created_by }}</a>
        </div>
        <form action="/contest/{{ $contest->id }}">
            <input type="submit" class="btn btn-primary btn-block" value="Register>>">
        </form>
        </div>
        <br>
        <div>
            <table class="table">
                <caption>Participantes registrados:</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuário</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contest->users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->user_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>