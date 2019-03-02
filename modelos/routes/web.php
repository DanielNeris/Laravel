<?php

use App\Categoria;

Route::get('/', function () {
    $categorias = Categoria::all();
    foreach ($categorias as $c) {
        echo "Id:" . $c->id . ", ";
        echo "nome:" . $c->nome . "<br>";
    }
});

Route::get('/inserir/{nome}', function ($nome){
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
    return redirect('/');
});

Route::get('/categoria/{id}', function ($id){
    $cat = Categoria::find($id);
    if (isset($cat)) {
        echo "Id:" . $cat->id . ", ";
        echo "nome:" . $cat->nome . "<br>";
    }
    else{
        echo "Essa categoria não existe";
    }
});

Route::get('/atualizar/{id}/{nome}', function ($id, $nome){
    $cat = Categoria::find($id);
    if (isset($cat)) {
        $cat->nome = $nome;
        $cat->save();
        return redirect('/');
    }
    else{
        echo "Essa categoria não existe";
    }
});

Route::get('/remover/{id}', function ($id){
    $cat = Categoria::find($id);
    if (isset($cat)) {
        $cat->delete();
        return redirect('/');
    }
    else{
        echo "Essa categoria não existe";
    }
});

Route::get('/categoriapornome/{nome}', function ($nome){
    $categorias = Categoria::where('nome', 'like' ,"%$nome%")->get();
    //$categorias = Categoria::where('id', '>', $nome)->get();
    if (isset($categorias)) {
        foreach ($categorias as $c) {
            echo "Id:" . $c->id . ", ";
            echo "nome:" . $c->nome . "<br>";
        }

        $count = Categoria::where('nome', 'like' ,"%$nome%")->count();
        echo "<h3>Quantidade de elementos encontrados: $count</h3>";

        $max = Categoria::where('nome', 'like' ,"%$nome%")->max('id');
        echo "<h3>Id maximo de elementos encontrados: $max</h3>";
    }
    else{
        echo "Essa categoria não existe";
    }
});

Route::get('/todas', function () {
    $categorias = Categoria::withTrashed()->get();
    foreach ($categorias as $c) {
        echo "Id:" . $c->id . ", ";
        echo "nome:" . $c->nome;
        if ($c->trashed()) {
            echo '(apagado) <br>';
        }
        else {
            echo  "<br>";
        }
    }
});

Route::get('/ver/{id}', function ($id){
    $cat = Categoria::withTrashed()->find($id);
    //$cat = Categoria::withTrashed()->where('id', $id)->get()->first();
    if (isset($cat)) {
        echo "Id:" . $cat->id . ", ";
        echo "nome:" . $cat->nome . "<br>";
    }
    else{
        echo "Essa categoria não existe";
    }
});

Route::get('/somenteapagadas', function () {
    $categorias = Categoria::onlyTrashed()->get();
    foreach ($categorias as $c) {
        echo "Id:" . $c->id . ", ";
        echo "nome:" . $c->nome;
        if ($c->trashed()) {
            echo '(apagado) <br>';
        }
        else {
            echo  "<br>";
        }
    }
});

Route::get('/restaurar/{id}', function ($id){
    $cat = Categoria::withTrashed()->find($id);
    if (isset($cat)) {
        $cat->restore();
        echo "Categoria restaurada" . $cat->id;
        echo "<a href=\"/\">Listar todas</a>";
    }
    else{
        echo "Essa categoria não existe";
    }
});

Route::get('/apagarpermanente/{id}', function ($id){
    $cat = Categoria::withTrashed()->find($id);
    if (isset($cat)) {
        $cat->forceDelete();
        return redirect('/');
    }
    else{
        echo "Essa categoria não existe";
    }
});