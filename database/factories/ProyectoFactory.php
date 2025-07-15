<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->name(),
            'tipo' => fake()->randomElement(['proyecto', 'actividad']),
            'objetivoGeneral' => fake()->paragraph($nbSentences = 1, $variableNbSentences = true),
            'objetivosEspecificos' => fake()->paragraph($nbSentences = 3, $variableNbSentences = true),
            'ciudad' => fake()->city(),
            'fechaInicio' => fake()->date(),
            'fechaFin' => fake()->date(),
            'ejecucion' => fake()->paragraph($nbSentences = 5, $variableNbSentences = true),
            'resumen' => fake()->sentence($nbWords = 20, $variableNbWords = true),
            'fotoPrincipal' => '/images/fotografias/nsr20211.jpg',
            'fotoPortada' => '/images/fotografias/navidad20212.jpg',
            'gestion_id' => 4,
        ];
    }
}
