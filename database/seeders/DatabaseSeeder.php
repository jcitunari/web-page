<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        //$this->call(UserSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(GestionSeeder::class);
        //$this->call(Asignar_cargoSeeder::class);
        //\App\Models\Proyecto::factory(10)->create();
    }
}
