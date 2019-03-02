<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert([
            'nome' => 'Daniel Neris' ,
            'cargo' => 'Full Stack Developer'
        ]);

        DB::table('desenvolvedores')->insert([
            'nome' => 'Jessica Celestino',
            'cargo' => 'Analista Desenvolvedora'
        ]);

        DB::table('desenvolvedores')->insert([
            'nome' => 'Claudio Onoue' ,
            'cargo' => 'Estagiário'
        ]);
    }
}
