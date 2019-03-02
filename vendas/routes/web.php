<?php

use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    $cats = DB::Table('categorias')->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    $nomes = DB::table('categorias')->pluck('nome');
    foreach ($nomes as $nome) {
        echo "$nome <br>";
    }

    echo "<hr>";

    $cats = DB::table('categorias')->where('id', 1)->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    //retornar apenas um elemento
    $cats = DB::table('categorias')->where('id', 1)->first();
    echo "id:" . $cats->id . " - ";
    echo "nome:" . $cats->nome . "<br> ";

    echo "<hr>";

    echo "<p>Retorna um array utulizando like</p>";
    $cats = DB::table('categorias')->where('nome', 'like', '%p%')->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    echo "<p>Sentenças lógicas</p>";
    $cats = DB::table('categorias')->where('id', 1)->orWhere('id', 2)->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    echo "<p>intervalos (between)</p>";
    $cats = DB::table('categorias')->whereBetween('id',[2,4])->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    echo "<p>intervalos (not between)</p>";
    $cats = DB::table('categorias')->whereNotBetween('id',[2,4])->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    echo "<p>Está em (in)</p>";
    $cats = DB::table('categorias')->whereIn('id', [2,3])->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    echo "<p>não está em (not in)</p>";
    $cats = DB::table('categorias')->whereNotIn('id', [2,3])->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    echo "<p>mais de uma condição</p>";
    $cats = DB::table('categorias')->where([
        ['id', 1],
        ['nome', 'like', '%Rou%']]
    )->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    echo "<p>Ordenando por nome</p>";
    $cats = DB::table('categorias')->orderBy('nome')->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }

    echo "<hr>";

    echo "<p>Ordenando (decrescente) por nome</p>";
    $cats = DB::table('categorias')->orderByDesc('nome')->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }
});

//-----------------------
//insert

Route::get('/novascategorias', function () {
    DB::table('categorias')->insert([
        ['nome' => 'Informática'],
        ['nome' => 'Cozinha'],
        ['nome' => 'Games']
    ]);
});

//insert recuperando o ID
// Route::get('/novascategorias', function () {
//     $id = DB::table('categorias')->insertGetId(
//         ['nome' => 'Carros']
//     );

//     echo "Nome ID = $id";
// });


//-----------------------
//update

Route::get('/atualizandocategorias', function () {
    $cats = DB::table('categorias')->where('id', 1)->first();
    echo "<p>Antes da atualização</p>";
    echo "id:" . $cats->id . " - ";
    echo "nome:" . $cats->nome . "<br> ";

    DB::table('categorias')->where('id', 1)->update([
        'nome' => 'Roupas DC shoes'
    ]);
    $cat = DB::table('categorias')->where('id', 1)->first();

    echo "<p>Depois da atualização</p>";
    echo "id:" . $cat->id . " - ";
    echo "nome:" . $cat->nome . "<br> ";

});

//----------
//delete

Route::get('/removendocategorias', function () {
    echo "<p>Antes do delete</p>";
    $cats = DB::Table('categorias')->get();
    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    };

    echo "<p>Depois do delete</p>";
    DB::Table('categorias')->where('id', 1)->delete();
    
    $cats = DB::Table('categorias')->get();

    foreach ($cats as $c) {
        echo "id:" . $c->id . " - ";
        echo "nome:" . $c->nome . "<br> ";
    }
});