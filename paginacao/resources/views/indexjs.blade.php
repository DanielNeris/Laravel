<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Paginação</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="container pt-5">
            <div class="card text-center">
                <div class="card-header">
                    Tabela de clientes
                </div>
                <div class="card-bory">
                    <h5 class="card-title" id="cardTitle"></h5>
                    <table id="tabelaClientes" class="table table-hover">
                        <thead>
                            <tr>                            
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sobrenome</th>
                                <th scope="col">E-mail</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <nav id="paginator">
                        <ul class="pagination"></ul>
                    </nav>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>

        <script>

            function getItemProximo(data) {
                i = data.current_page + 1;
                if (data.last_page == data.current_page) {
                    s = '<li class="page-item disabled"><a class="page-link" href="javascript:void(0)"> Proximo </a></li>';
                }
                else {
                    s ='<li class="page-item">'
                    s += '<a class="page-link"' + ' pagina="'+ i +'" href="javascript:void(0)"> Proximo </a></li>';
                }
                return s;
            }

            function getItemAnterior(data) {
                i = data.current_page - 1;
                if (1 == data.current_page) {
                    s = '<li class="page-item disabled"><a class="page-link" href="javascript:void(0)"> Anterior </a></li>';
                }
                else {
                    s ='<li class="page-item">'
                    s += '<a class="page-link"' + ' pagina="'+ i +'" href="javascript:void(0)"> Anterior </a></li>';
                }
                return s;
            }

            function getItem(data, i) {
                if (i == data.current_page) {
                    s = '<li class="page-item active"> <a class="page-link" href="javascript:void(0)">' + i + '</a></li>';
                }
                else {
                    s ='<li class="page-item">'
                    s += '<a class="page-link"' + ' pagina="'+ i +'" href="javascript:void(0)">' + i + '</a></li>';
                }
                return s;
            }

            function montarPaginator(data) {
                $('#paginator>ul>li').remove();
                $('#paginator>ul').append(getItemAnterior(data));

                n = 10;
                if(data.current_page - n/2 <= 1) {
                    inicio = 1;
                }
                else if(data.last_page - data.current_page < n) {
                    inicio = data.last_page - n + 1;
                }
                else {
                    inicio = data.current_page - n/2;
                }
                fim = inicio + n - 1;
                for (var i = inicio; i <= fim; i++) {
                    s = getItem(data, i);
                    $('#paginator>ul').append(s);
                }

                $('#paginator>ul').append(getItemProximo(data));
            }

            function montarLinha(cliente) {
                return "<tr>" + 
                            "<td>" + cliente.id + "</td>" +
                            "<td>" + cliente.nome + "</td>" + 
                            "<td>" + cliente.sobrenome + "</td>" + 
                            "<td>" + cliente.email + "</td>" +  
                        "</tr>";
            }

            function montarTabela(data) {
                $('#tabelaClientes>tbody>tr').remove();

                $.each(data.data, function (i, value) {
                    // console.log(data.data[i]);
                    s = montarLinha(data.data[i]);
                    $('#tabelaClientes>tbody').append(s);
                });
            }

            function carregarClientes(pagina) {
                $.getJSON('/json', {page: pagina}, function(data) {
                    console.log(data);
                    montarTabela(data);
                    montarPaginator(data);

                    
                    $("#paginator>ul>li>a").click(function () {
                        carregarClientes($(this).attr('pagina'));
                    });

                    $("#cardTitle").html("Exibindo " + data.per_page + " clientes de " + data.total + " ( " + data.from + " a " + data.to + " )");
                });
            }

            $(function() {
                carregarClientes(1);
            });
        </script>
    </body>
</html>
