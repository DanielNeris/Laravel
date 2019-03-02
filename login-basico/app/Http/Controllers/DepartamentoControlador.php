<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoControlador extends Controller
{
    public function Index() {
        echo "<h4>Lista de Categorias</h4>";

        echo "<ul>" .
                "<li>Alimentos</li>" .
                "<li>Eletrônicos</li>" .
                "<li>Móveis</li>" .
                "<li>Informática</li>" .
            "</ul>";
        echo "<hr>";

        if (Auth::check()) {
            $user = Auth::user();
            echo "<h4> Você está logado! <h4>";

            echo "<p> $user->id </p>";
            echo "<p> $user->name </p>";
            echo "<p> $user->email </p>";
        }
        else {
            echo "<h4> Você Não está logado! <h4>";
        }
    }
}
