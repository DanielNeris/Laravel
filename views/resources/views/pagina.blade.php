<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap</title>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link rel="stylesheet" href="{{URL::to('css/app.css')}}">
</head>
<body>
    
    <section>
        <div class="container">
            <!-- As a heading -->
            <nav class="navbar navbar-light bg-light">
                <span class="navbar-brand mb-0 h1">Navbar</span>
            </nav>

            <!-- da pra passar parametros ou slot -->
            @alerta(['tipo' => 'danger'])
                <strong>Erro:</strong> Sua mensagem de erro.
                @slot('titulo')
                        Erro faltal!
                @endslot
            @endalerta

            @alerta(['tipo' => 'success'])
                <strong>Sucesso:</strong> Sua mensagem de sucesso.
                @slot('titulo')
                        Sucesso!
                @endslot
            @endalerta
 
        </div>
    </section>

    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script src="{{URL::to('js/app.js')}}"></script>
</body>
</html>