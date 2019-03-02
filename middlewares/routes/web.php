<?php

use App\Http\Middleware\PrimeiroMiddleware;

Route::get('/usuarios', 'UsuarioControlador@Index')->middleware(PrimeiroMiddleware::class);
