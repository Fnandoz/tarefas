<?php

use Illuminate\Database\Seeder;
use App\Regras;

class RegrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $convidado = new Regras();
      $convidado->nome = "convidado";
      $convidado->descricao = "Regra convidado";
      $convidado->save();

      $administrador = new Regras();
      $administrador->nome = "administrador";
      $administrador->descricao = "Regra administrador";
      $administrador->save();
    }
}
