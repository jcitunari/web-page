<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->ci = "12345678";
        $user->nombre = "Ronaldo";
        $user->apPaterno = "Quispe";
        $user->apMaterno = "Condori";
        $user->fechaNacimiento = '1996-11-08';
        $user->fechaJuramento = '2020-09-20';
        $user->profesion = "Ing. de Sistemas";
        $user->presentacion = "Persona responsable";
        $user->intereses = "Liderazgo, horatoria";
        $user->foto = "esta es unafoto";
        $user->curriculum = "este es un PDF";
        $user->celular = "66666666";
        $user->email = "ronaldo@gmail.com";
        $user->password = "1234";
        $user->rol = "USUARIO";

        $user->save();
    }
}
