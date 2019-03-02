<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Cliente;
use App\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();

    foreach ($clientes as $c) {
        echo "<p>Id: " . $c->id . "</p>";
        echo "<p>Nome: " . $c->nome . "</p>";
        echo "<p>Telefone: " . $c->telefone . "</p>";
        // $e = Endereco::where('cliente_id', $c->id)->first();
        echo "<p>Rua: " . $c->endereco->rua . "</p>";
        echo "<p>Numero: " . $c->endereco->numero . "</p>";
        echo "<p>Bairro: " . $c->endereco->bairro . "</p>";
        echo "<p>Cidade: " . $c->endereco->cidade . "</p>";
        echo "<p>Uf: " . $c->endereco->uf . "</p>";
        echo "<p>Cep: " . $c->endereco->cep . "</p>";
        echo "<hr>";
    }
});


Route::get('/enderecos', function () {
    $ends = Endereco::all();

    foreach ($ends as $e) {
        echo "<p>Cliente_id: " . $e->cliente_id . "</p>";
        echo "<p>Nome: " . $e->cliente->nome . "</p>";
        echo "<p>Telefone: " . $e->cliente->telefone . "</p>";
        echo "<p>Rua: " . $e->rua . "</p>";
        echo "<p>Numero: " . $e->numero . "</p>";
        echo "<p>Bairro: " . $e->bairro . "</p>";
        echo "<p>Cidade: " . $e->cidade . "</p>";
        echo "<p>Uf: " . $e->uf . "</p>";
        echo "<p>Cep: " . $e->cep . "</p>";
        echo "<hr>";
    }
});

Route::get('/insert', function () {
    $c = new Cliente();
    $c->nome = "Jose";
    $c->telefone = "11 994798909";
    $c->save();

    $e = new Endereco();
    $e->rua = "Jardim Mato alto";
    $e->numero = 666;
    $e->bairro = "Cruzadas";
    $e->cidade = "Montes Claros";
    $e->uf = "MG";
    $e->cep = "19989-000";
    $c->endereco()->save($e);
});

Route::get('clientes/json', function() {
    // $clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});

Route::get('enderecos/json', function() {
    // $ends = Endereco::all();
    $ends = Endereco::with(['cliente'])->get();
    return $ends->toJson();
});