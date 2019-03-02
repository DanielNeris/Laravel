<?php

// use App\Http\Middleware\PrimeiroMiddleware;

// Route::get('/usuarios', 'UsuarioControlador@Index')->middleware('primeiro');

// Route::get('/usuarios', 'UsuarioControlador@Index');

// Route::get('/terceiro', function (){
//     return 'Passou pelo terceiroMiddleware';
// })->middleware('terceiro::daniel,20');

Route::get('/usuarios', 'UsuarioControlador@Index')->middleware(['primeiro', 'segundo']);