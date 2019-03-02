<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoControlador@Index');

Route::get('/negado', function () {
    return "Acesso Negado, voce nao esta logado";
})->name('negado');

Route::get('/negadologin', function () {
    return "Acesso Negado, voce nao é adm.";
})->name('negadologin');

Route::post('/login', function (Request $req) {

    $login_ok = false;
    $admin = false;

    switch ($req->input('user')) {
        case 'joao':
        $login_ok = $req->input('passwd') === "senhajoao";
        $admin = true;
            break;
        case 'marcos':
        $login_ok = $req->input('passwd') === "senhamarcos";
            break;
        default:
        $login_ok = false;
            break;
    }

    if($login_ok) {
        $login = ['user' => $req->input('user'), 'admin' => $admin];
        $req->session()->put('login', $login);
        return response("Login OK", 200);
    }
    else{
        $req->session()->flush();
        return response("Erro no login", 404);
    }
});

Route::get('/logout', function (Request $request) {
    $request->session()->flush();
    return response('Deslogado com sucesso', 200);
});