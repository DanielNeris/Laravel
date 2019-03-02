<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    public function listar(){
        $produtos = [
            "Notebook Asus 17", 
            "Mouse Razor", 
            "Teclado Razor", 
            "Monitor 21 - Samsung", 
            "Impressora HP",
            "Disco SSD 512 GB"
        ];

        return view('produtos', compact('produtos'));
    }

    public function sessaoProdutos($palavra){
        return view('sessaoProdutos', compact('palavra'));
    }

    public function mostrarOpcoes(){
        return view('mostrar_opcoes');
    }

    public function opcoes($opcao){
        return view('opcoes', compact('opcao'));
    }

    public function loopFor($n){
        return view('loop_for', compact('n'));
    }

    public function loopForeach(){
        $produtos = [
            ['id' => 1, 'nome' => "Computador"],
            ['id' => 2, 'nome' => "Mouse"],
            ['id' => 3, 'nome' => "Teclado"],
            ['id' => 4, 'nome' => "Fone"],
            ['id' => 5, 'nome' => "Impressora"],
            ['id' => 6, 'nome' => "Monitor"]
        ];
        return view('loop_foreach', compact('produtos'));
    }
}
