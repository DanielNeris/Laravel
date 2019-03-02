<?php

Route::get('/', 'ClienteControlador@index');
Route::get('/novocliente', 'ClienteControlador@create');
Route::post('/cliente', 'ClienteControlador@store');
