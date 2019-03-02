<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        echo "<h4>Lista de Produtos</h4>";

        echo "<ul>" .
                "<li>Macarrão</li>" .
                "<li>Feijão</li>" .
                "<li>Carne Bovina</li>" .
                "<li>Arroz</li>" .
                "<li>Leite</li>" .
            "</ul>";
    }
}
