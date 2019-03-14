<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {
        $produtos = [
            ['id' => 1, 'nome' => 'produto 1'],
            ['id' => 2, 'nome' => 'produto 2'],
            ['id' => 3, 'nome' => 'produto 3'],
            ['id' => 4, 'nome' => 'produto 4']
        ];

        return $produtos->toJson();
    }
}
