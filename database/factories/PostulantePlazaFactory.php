<?php

namespace Database\Factories;

use App\Models\postulante;
use App\Models\postulantePlaza;
use App\Models\Plaza;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostulantePlazaFactory extends Factory
{
    protected $model = postulantePlaza::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'postulante_id' => postulante::inRandomOrder()->first()->id,
            'plaza_id' => Plaza::inRandomOrder()->first()->id,
            'estado' => $this->faker->randomElement(['pendiente', 'en revision', 'aprobado', 'rechazado']),
            'fecha_postulacion' => $this->faker->date(),
        ];
    }
}
