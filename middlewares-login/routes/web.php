<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoControlador@Index');

Route::post('/login', function (Request $req) {

    $login_ok = false;

    switch ($req->input('user')) {
        case 'joao':
        $login_ok = $req->input('passwd') === "senhajoao";
            break;
        case 'marcos':
        $login_ok = $req->input('passwd') === "senhamarcos";
            break;
        default:
        $login_ok = false;
            break;
    }

    if($login_ok) {
        return response("Login OK", 200);
    }
    else{
        return response("Erro no login", 404);
    }
});