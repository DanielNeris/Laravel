<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmação</title>
</head>
<body>
    <h4> Seja bem vindo(a), {{ $nome }} </h4>
    <p>Você acabou de acessar o sistema utilizando seu email: {{ $email }}</p>

    <p>Data / hora de acesso {{ $datahora }} </p>

    <p>Clique no lonk abaixo para confirmar seu email de registro:</p>

    <a href="{{ $link }}">CLIQUE AQUI</a>
</body>
</html>