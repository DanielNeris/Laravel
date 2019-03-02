<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            [
                'nome' => 'Camiseta Polo',
                'Preco' => 100,
                'Estoque' => 4,
                'categoria_id' => 1
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Calça Jeans',
                'Preco' => 120,
                'Estoque' => 1,
                'categoria_id' => 1
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Camisa Manga Longa',
                'Preco' => 34,
                'Estoque' => 2,
                'categoria_id' => 1
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'PC Games',
                'Preco' => 56,
                'Estoque' => 4,
                'categoria_id' => 2
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Impressora',
                'Preco' => 37,
                'Estoque' => 5,
                'categoria_id' => 6
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Mouse',
                'Preco' => 37,
                'Estoque' => 6,
                'categoria_id' => 6
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Perfume Quasar',
                'Preco' => 55,
                'Estoque' => 7,
                'categoria_id' => 3
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Cama de Casal',
                'Preco' => 11,
                'Estoque' => 8,
                'categoria_id' => 4
            ]
        );

        DB::table('produtos')->insert(
            [
                'nome' => 'Móveis',
                'Preco' => 11,
                'Estoque' => 11,
                'categoria_id' => 4
            ]
        );
    }
}
