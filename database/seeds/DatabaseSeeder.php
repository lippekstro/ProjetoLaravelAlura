<?php

use Illuminate\Database\Seeder;
use estoque\Categoria;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('CategoriaTableSeeder');
    }
}

class CategoriaTableSeeder extends Seeder{
    public function run(){
        Categoria::create(['nome' => 'eletrodomesticos']);
        Categoria::create(['nome' => 'eletronicos']);
        Categoria::create(['nome' => 'brinquedos']);
        Categoria::create(['nome' => 'livros']);
        Categoria::create(['nome' => 'esportes']);
    }
}