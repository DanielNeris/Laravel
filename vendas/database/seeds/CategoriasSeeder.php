<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nome' => 'Roupas'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Eletrônicos'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Perfumes'
        ]);
        DB::table('categorias')->insert([
            'nome' => 'Móveis'
        ]);
    }
}
