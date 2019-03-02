<?php

// use App\Http\Middleware\PrimeiroMiddleware;

// Route::get('/usuarios', 'UsuarioControlador@Index')->middleware('primeiro');

Route::get('/', function (){
    return 'teste2';
});
