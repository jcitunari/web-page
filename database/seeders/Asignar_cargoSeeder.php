<?php

namespace Database\Seeders;

use App\Models\Asignar_cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Asignar_cargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignacion1 = new Asignar_cargo();
        $asignacion1->user_id = 1;
        $asignacion1->gestion_id = 4;
        $asignacion1->cargo_id= 1;
        $asignacion1->save();

        $asignacion2 = new Asignar_cargo();
        $asignacion2->user_id = 2;
        $asignacion2->gestion_id = 4;
        $asignacion2->cargo_id= 2;
        $asignacion2->save();

        $asignacion3 = new Asignar_cargo();
        $asignacion3->user_id = 3;
        $asignacion3->gestion_id = 4;
        $asignacion3->cargo_id= 3;
        $asignacion3->save();

        $asignacion4 = new Asignar_cargo();
        $asignacion4->user_id = 4;
        $asignacion4->gestion_id = 4;
        $asignacion4->cargo_id= 4;
        $asignacion4->save();

        $asignacion5 = new Asignar_cargo();
        $asignacion5->user_id = 5;
        $asignacion5->gestion_id = 4;
        $asignacion5->cargo_id= 5;
        $asignacion5->save();

        /*$asignacion6 = new Asignar_cargo();
        $asignacion6->user_id = 6;
        $asignacion6->gestion_id = 4;
        $asignacion6->cargo_id= 6;
        $asignacion6->save();

        $asignacion7 = new Asignar_cargo();
        $asignacion7->user_id = 7;
        $asignacion7->gestion_id = 4;
        $asignacion7->cargo_id= 7;
        $asignacion7->save();

        $asignacion8 = new Asignar_cargo();
        $asignacion8->user_id = 8;
        $asignacion8->gestion_id = 4;
        $asignacion8->cargo_id= 8;
        $asignacion8->save();

        $asignacion9 = new Asignar_cargo();
        $asignacion9->user_id = 9;
        $asignacion9->gestion_id = 4;
        $asignacion9->cargo_id= 9;
        $asignacion9->save();

        $asignacion10 = new Asignar_cargo();
        $asignacion10->user_id = 10;
        $asignacion10->gestion_id = 4;
        $asignacion10->cargo_id= 10;
        $asignacion10->save();*/
    }
}
