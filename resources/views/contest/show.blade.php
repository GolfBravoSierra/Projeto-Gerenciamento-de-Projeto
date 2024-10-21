<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Contest</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
        <div>
            <a href="/login">Register >></a>
        </div>
        <br>
        <div>
            <h4>
                Participantes registrados:
            </h4>
            <table>
                
            </table>
        </div>
    </div>
</body>