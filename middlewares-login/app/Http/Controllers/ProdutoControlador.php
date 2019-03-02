<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    private $produtos = [
        "Televisao 40",
        "Notebook Dell G3",
        "Impressora HP",
        "HD Externo"
    ];

    public function __construct() {
        $this->middleware('produtoAdmin');
    }

    public function Index() {
        
        echo "<h3>Produtos</h3>";
            echo "<ol>";
            foreach ($this->produtos as $p) {
                echo "<li> $p </li>";
            } 
            echo"<ol>";
    }
}
