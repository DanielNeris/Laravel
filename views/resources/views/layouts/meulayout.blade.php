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

            @hasSection ('minhaSessaoProdutos')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produtos</h5>
                    <p class="card-text">@yield('minhaSessaoProdutos')</p>
                    <a href="#" class="card-link">Informações</a>
                    <a href="#" class="card-link">Ajuda</a>
                </div>
            </div>
            @endif

        </div>
    </section>

    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script src="{{URL::to('js/app.js')}}"></script>
</body>
</html>