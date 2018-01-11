<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Regras;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regra_administrador = Regras::where('nome','administrador')->firstOrFail();
        $regra_convidado = Regras::where('nome','convidado')->firstOrFail();

        $adm = new User();
        $adm->name = "Administrador";
        $adm->email = "admin@teste.com";
        $adm->password = bcrypt('teste');
        $adm->save();
        $adm->regras()->attach($regra_administrador);

        $conv = new User();
        $conv->name = "Convidado";
        $conv->email = "convidado@teste.com";
        $conv->password = bcrypt('teste');
        $conv->save();
        $conv->regras()->attach($regra_convidado);

    }
}
