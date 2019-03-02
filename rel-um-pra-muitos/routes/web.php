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

use App\Categoria;
use App\Produto;

Route::get('/categorias', function () {
    $cats = Categoria::all();

    if(count($cats) == 0){
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }
    else{
        foreach ($cats as $c) {
            echo "<p> id: $c->id - nome: $c->nome </p>";
            echo "<hr>";
        }
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();

    if(count($prods) == 0){
        echo "<h4>Você não possui nenhum produto cadastrado</h4>";
    }
    else{
        echo "<table>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th> id </th>";
                    echo "<th> categoria </th>";
                    echo "<th> nome </th>";
                    echo "<th> estoque </th>";
                    echo "<th> preco </th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($prods as $p) {
                echo "<tr>";
                    echo "<td> $p->id </td>";
                    echo "<td>" . $p->categoria->nome . "</td>";
                    echo "<td> $p->nome </td>";
                    echo "<td> $p->estoque </td>";
                    echo "<td> $p->preco </td>";
                echo "</tr>";
            }
            echo "</tbory>";
        echo "</table>";
    }
});

Route::get('/categoriasprodutos', function () {
    $cats = Categoria::all();

    if(count($cats) == 0){
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }
    else{
        foreach ($cats as $c) {
            echo "<p> id: $c->id - nome: $c->nome </p>";
            $prods = $c->produtos;

            if (count($prods) > 0) {
                echo "<ul>";
                    foreach ($prods as $p) {
                        echo "<li> $p->nome </li>";
                    }
                echo "</ul>";
            }
        }
    }
});

Route::get('/categoriasprodutos/json', function () {
    $cats = Categoria::with(['produtos'])->get();
    return $cats->toJson();
});

Route::get('/adicionarproduto', function () {
    $c = Categoria::find(1);
    $p = new Produto();
    $p->nome = "Meu novo Produto";
    $p->estoque = 10;
    $p->preco = 100;
    $p->Categoria()->associate($c);
    $p->save();
    return $p->toJson();
});

Route::get('/removerprodutocategoria', function () {
    $p = Produto::find(10);
    if(isset($p)){
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
    
});

Route::get('/adicionarproduto/{catid}', function ($catid) {
    $cat = Categoria::with('produtos')->find($catid);
    $p = new Produto();
    $p->nome = "Meu novo Produto 3";
    $p->estoque = 20;
    $p->preco = 50;

    if(isset($cat)){
        $cat->produtos()->save($p);
    }
    $cat->load('produtos');
    return $cat->toJson();
});