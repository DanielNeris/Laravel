<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return "<h1>Seja bem vindo</h1>";
});

Route::get('/ola/sejabemvindo', function () {
    return view('welcome');
});

Route::get('/nome/{nome}', function($nome){
    return "<h1>Olá, $nome!</h1>";
});

Route::get('/repetir/{x}/{n}', function($x, $n){
    
    if(is_numeric($n)){
        for ($i=0; $i < $n ; $i++) { 
            echo "<h4>Olá, $x!</h4>";
         }
    }
    else{
        echo "<h3>Você não digitou um número inteiro!</h3>";
    }

});

//condições com 'expressão regular (regex)'
Route::get('/seunome/{nome}/{n}', function($nome, $n){
    for ($i=0; $i < $n ; $i++) { 
        echo "<h4>Olá, $nome! ($i)</h4>";
    }
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/semregra/{nome?}', function($nome = null){
    if(isset($nome)){
        echo "<h4>Olá, $nome!</h4>";
    }
    else{
        echo "<h4>Informe seu nome!</h4>";
    }
});

//agrupando rotas /app/o nome da pagina 
Route::prefix('app')->group(function () {
    Route::get('/', function () {
        return "Página principal do APP";
    });
    Route::get('/profile', function () {
        return "Página Profile";
    });
    Route::get('/about', function () {
        return "Página About";
    });
});

//redirecionamento
//301 = codigo http
Route::redirect('/aqui', 'ola', 301);

// Route::get('/hello', function () {
//     return view('hello');
// });

// {1} = rota, {2} = view
Route::view('/hello', 'hello');

//Route::view('/hellonome', 'hellonome', ['nome' => 'Daniel', 'sb' => 'Neris']);

Route::get('/hellonome/{nome}/{sb}', function($nome, $sb) {
    return view('hellonome', ['nome' => $nome, 'sb' => $sb]);
});


//metodos mais utilizados do php
Route::get('/rest/hello', function() {
    return "Hello (GET)";
});

Route::post('/rest/hello', function(Request $req) {
    $nome = $req->input('nome');
    return "Hello $nome! (POST)";
});

Route::put('/rest/hello', function() {
    return "Hello (PUT)";
});

Route::patch('/rest/hello', function() {
    return "Hello (PATCH)";
});

Route::options('/rest/hello', function() {
    return "Hello (OPTIONS)";
});

//metodos, rota, o que fazer
Route::match(['get', 'post'], 'rest/hello2', function() {
    return "Hello world 2";
});

//qualquer metodo
Route::any('rest/hello3', function() {
    return "Hello world 3";
});

//Nomeando Rotas
Route::get('/produtos', function() { ?>
    <h1>Produtos</h1>
    <ol>
        <li>Notebook</li>
        <li>Impressora</li>
        <li>Mouse</li>
    </ol>

<?php
})->name('meusprodutos');

Route::get('/linksprodutos', function() {
    $url = route('meusprodutos'); ?>
    <a href="<?= $url ?>">Meus Produtos</a>
<?php
});

Route::get('/redirecionarprodutos', function() {
    return redirect()->route('meusprodutos');
});