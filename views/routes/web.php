<?php

Route::get('/', function () {
    return view('pagina');
});

Route::get('/primeiraview', function(){
    return view('minhaview');
});

Route::get('/ola', function(){
    return view('minhaview')->with('nome', 'DANIEL')->with('sb', 'DE SOUZA NERIS');
});

Route::get('/ola/{nome}/{sb}', function($nome, $sb){
    //return view('minhaview')->with('nome', 'DANIEL')->with('sb', 'DE SOUZA NERIS');

    // $parametros = ['nome' => $nome, 'sb' => $sb];
    // return view('minhaview', $parametros);

    return view('minhaview', compact('nome', 'sb'));
});

Route::get('/email/{email}', function($email){
    if(View::exists('email')){
        return view('email', compact('email'));
    }
    else{
        return view('erro');
    }
});

Route::get('/produtos', 'ProdutoControlador@listar');

Route::get('/sessaoProdutos/{palavra}', 'ProdutoControlador@sessaoProdutos');

Route::get('/mostrar_opcoes', 'ProdutoControlador@mostrarOpcoes');

Route::get('/opcoes/{opcao}', 'ProdutoControlador@opcoes');

Route::get('/loop/for/{n}', 'ProdutoControlador@loopFor');

Route::get('/loop/foreach', 'ProdutoControlador@loopForeach');