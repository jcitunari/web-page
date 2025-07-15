<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo1 = new Cargo();
        $cargo1->nombre = "PRESIDENTE";
        $cargo1->tipo = "COMITE EJECUTIVO LOCAL";
        $cargo1->prioridad = 1;
        $cargo1->save();

        $cargo2 = new Cargo();
        $cargo2->nombre = "VICEPRESIDENTE";
        $cargo2->tipo = "COMITE EJECUTIVO LOCAL";
        $cargo2->prioridad = 2;
        $cargo2->save();

        $cargo3 = new Cargo();
        $cargo3->nombre = "SECRETARIA";
        $cargo3->tipo = "COMITE EJECUTIVO LOCAL";
        $cargo3->prioridad = 3;
        $cargo3->save();

        $cargo4 = new Cargo();
        $cargo4->nombre = "TESORERIA";
        $cargo4->tipo = "COMITE EJECUTIVO LOCAL";
        $cargo4->prioridad = 4;
        $cargo4->save();

        $cargo10 = new Cargo();
        $cargo10->nombre = "PASADO PRESIDENTE";
        $cargo10->tipo = "COMITE EJECUTIVO LOCAL";
        $cargo10->prioridad = 5;
        $cargo10->save();

        $cargo5 = new Cargo();
        $cargo5->nombre = "ASESORIA LEGAL";
        $cargo5->tipo = "COMITE EJECUTIVO LOCAL";
        $cargo5->prioridad = 6;
        $cargo5->save();

        $cargo6 = new Cargo();
        $cargo6->nombre = "ASESORIA PRESIDENCIAL";
        $cargo6->tipo = "COMITE EJECUTIVO LOCAL";
        $cargo6->prioridad = 7;
        $cargo6->save();

        $cargo7 = new Cargo();
        $cargo7->nombre = "DIR. DE DESARROLLO DE HABILIDADES";
        $cargo7->tipo = "JUNTA DIRECTIVA LOCAL";
        $cargo7->prioridad = 10;
        $cargo7->save();

        $cargo8 = new Cargo();
        $cargo8->nombre = "DIR. DE MIEMBRO INDIVIDUAL";
        $cargo8->tipo = "JUNTA DIRECTIVA LOCAL";
        $cargo8->prioridad = 10;
        $cargo8->save();

        $cargo11 = new Cargo();
        $cargo11->nombre = "DIR. DE RELACIONES PUBLICAS";
        $cargo11->tipo = "JUNTA DIRECTIVA LOCAL";
        $cargo11->prioridad = 10;
        $cargo11->save();

        $cargo12 = new Cargo();
        $cargo12->nombre = "DIR. DE MARKETING";
        $cargo12->tipo = "JUNTA DIRECTIVA LOCAL";
        $cargo12->prioridad = 10;
        $cargo12->save();

        $cargo13 = new Cargo();
        $cargo13->nombre = "DIR. DE PROTOCOLO";
        $cargo13->tipo = "JUNTA DIRECTIVA LOCAL";
        $cargo13->prioridad = 10;
        $cargo13->save();

        $cargo14 = new Cargo();
        $cargo14->nombre = "DIR. DE PROYECTOS";
        $cargo14->tipo = "JUNTA DIRECTIVA LOCAL";
        $cargo14->prioridad = 10;
        $cargo14->save();

        $cargo15 = new Cargo();
        $cargo15->nombre = "DIR. DE TECNOLOGIA";
        $cargo15->tipo = "JUNTA DIRECTIVA LOCAL";
        $cargo15->prioridad = 10;
        $cargo15->save();

        $cargo16 = new Cargo();
        $cargo16->nombre = "DIR. DE INNOVACION";
        $cargo16->tipo = "JUNTA DIRECTIVA LOCAL";
        $cargo16->prioridad = 10;
        $cargo16->save();

        $cargo9 = new Cargo();
        $cargo9->nombre = "MIEMBRO INDIVIDUAL";
        $cargo9->tipo = "ASAMBLEA GENERAL";
        $cargo9->prioridad = 11;
        $cargo9->save();
    }
}
