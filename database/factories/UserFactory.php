<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ci' => fake()->randomNumber($nbDigits = 8, $strict = false),
            'nombre' => fake()->firstName(),
            'apPaterno' => fake()->lastName(),
            'apMaterno' => fake()->lastName(),
            'fechaNacimiento' => fake()->date(),
            'fechaJuramento' => fake()->date(),
            'profesion' => fake()->word(),
            'presentacion' => fake()->paragraph(),
            'intereses' => fake()->word(),
            'foto' => '/images/miembros/PabloMeruvia.jpg',
            'curriculum' => '/docs/fernandorjasCV.pdf',
            'celular'=> fake()->randomNumber($nbDigits = 8, $strict = false),
            'email' => fake()->freeEmail(),
            'email_verified_at' => now(),
            'password' => fake()->password(),
            //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'rol' => fake()->randomElement(['USUARIO', 'EDITOR', 'INTERNAUTA']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
