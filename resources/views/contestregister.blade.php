<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Criação de Campeonatos</h2>
        <form action="/action_page.php">
            <label for="title">Nome do Campeonato:</label>
                <input type="text" id="title" name="title"><br><br>
                    <label for="mode">Modo:</label>
                        <input type="text" id="mode" name="mode"><br><br>
                            <label for="begin_date">Data de Inicio:</label>
                            <input type="datetime-local" id="begin_date" name="begin_date"   value="2018-06-12T19:30" min="2018-06-07T00:00" max="2018-06-14T00:00"  />
                            <label for="end_date">Data de Termino:</label>
                            <input type="datetime-local" id="end_date" name="end_date" value="2018-07-22" min="2018-01-01" max="2018-12-31" /><br><br>
                    <label for="description">Descrição do Campeonato:</label><br>
                <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>