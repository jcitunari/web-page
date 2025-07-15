<?php

namespace Database\Seeders;

use App\Models\Gestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gestion1 = new Gestion();
        $gestion1->anio = '2017';
        $gestion1->save();

        $gestion2 = new Gestion();
        $gestion2->anio = '2018';
        $gestion2->save();

        $gestion3 = new Gestion();
        $gestion3->anio = '2019';
        $gestion3->save();

        $gestion4 = new Gestion();
        $gestion4->anio = '2020';
        $gestion4->save();

        $gestion5 = new Gestion();
        $gestion5->anio = '2021';
        $gestion5->save();

        $gestion6 = new Gestion();
        $gestion6->anio = '2022';
        $gestion6->save();

        $gestion7 = new Gestion();
        $gestion7->anio = '2023';
        $gestion7->save();
    }
}
