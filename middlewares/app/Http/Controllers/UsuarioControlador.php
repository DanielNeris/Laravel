<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioControlador extends Controller
{
    public function Index(){
        return '<h3> Lista de Usuários <h3>' .
            '<ul>' .
                '<li> Daniel </li>' .
                '<li> Claudio </li>' .
                '<li> Jessica </li>' .
                '<li> Matheus </li>' .
            '</ul>';
    }
}
