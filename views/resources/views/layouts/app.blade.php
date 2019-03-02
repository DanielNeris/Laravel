<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template @yield('titulo')</title>
</head>
<body>
    @section('barralateral')
        Esta parte da seção é do Template Pai
    @show

    <div>
        @yield('conteudo')
    </div>
</body>
</html>