<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;

Route::get('/desenvolvedorprojetos', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach ($desenvolvedores as $d) {
        echo "<p> Nome do Desenvolvedor: $d->nome </p>";
        echo "<p> Cargo do Desenvolvedor: $d->cargo </p>";

        if (count($d->projetos) > 0) {
            echo "Projetos";

            foreach ($d->projetos as $p) {
                echo "<ul>";
                    echo "<li> Nome: " . $p->nome . "</li>";
                    echo "<li> Estimativa de Horas: " . $p->estimativa_horas . "</li>";
                    echo "<li> Horas Trabalhadas: " . $p->pivot->horas_semanais . "</li>";
                echo "</ul>";
            }
        }
    }

    // return $desenvolvedores->toJson();
});

Route::get('/projetodesenvolvedores', function () {
    $projts = Projeto::with('desenvolvedores')->get();

    foreach ($projts as $p) {
        echo "<p> Nome do Projeto: $p->nome </p>";
        echo "<p> Estimativa de Horas: $p->estimativa_horas </p>";

        if (count($p->desenvolvedores) > 0) {
            echo "Desenvolvedores";

            foreach ($p->desenvolvedores as $d) {
                echo "<ul>";
                    echo "<li> Nome do Desenvolvedor: " . $d->nome . "</li>";
                    echo "<li> Cargo do Desenvolvedor: " . $d->cargo . "</li>";
                    echo "<li> Horas Trabalhadas: " . $d->pivot->horas_semanais . "</li>";
                echo "</ul>";
            }
        }
    }

    // return $projts->toJson();
});

Route::get('/alocar', function () {
    $proj = Projeto::find(4);

    if(isset($proj)) {
        // $proj->desenvolvedores()->attach(1, ['horas_semanais' => 50]);
        $proj->desenvolvedores()->attach([
            2 => ['horas_semanais' => 20],
            3 => ['horas_semanais' => 30],
        ]);
    }
});

Route::get('/desalocar', function () {
    $proj = Projeto::find(4);
    $proj->desenvolvedores()->detach(1,3);
});