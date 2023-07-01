<?php

namespace Database\Factories;

use App\Models\postulante;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostulanteFactory extends Factory
{
    protected $model = postulante::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'dni' => $this->faker->unique()->randomNumber(8),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-50 years', '-18 years'),
            'genero' => $this->faker->randomElement(['masculino', 'femenino']),
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->email,
        ];
    }
}
