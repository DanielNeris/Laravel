<?php

// use App\Http\Middleware\PrimeiroMiddleware;

// Route::get('/usuarios', 'UsuarioControlador@Index')->middleware('primeiro');

Route::get('/usuarios', 'UsuarioControlador@Index');

Route::get('/', function (){
    return 'teste2';
});

// Route::get('/usuarios', 'UsuarioControlador@Index')->middleware(['primeiro', 'segundo']);