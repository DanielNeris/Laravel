<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos</title>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link rel="stylesheet" href="{{URL::to('css/app.css')}}">
</head>
<body>
    
    <section>
        <div class="container">

            @if (isset($produtos))
                @if (count($produtos) == 0)
                    <h1>Nenhum produto</h1>
                @elseif (count($produtos) === 1)
                    <h1>Um produtos</h1>
                @else
                    @foreach ($produtos as $produto)
                        <p>Nome: {{$produto}}</p>
                    @endforeach
                @endif
            @else
                <h2>Variável produtos não foi passada como parametro</h2>
            @endif

            @empty($produtos)
                <h2>Nada em produtos</h2>
            @endempty

        </div>
    </section>

    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script src="{{URL::to('js/app.js')}}"></script>
</body>
</html>