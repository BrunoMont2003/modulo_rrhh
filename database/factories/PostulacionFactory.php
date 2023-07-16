<?php

namespace Database\Factories;

use App\Models\postulante;
use App\Models\postulacion;
use App\Models\Plaza;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostulacionFactory extends Factory
{
    protected $model = Postulacion::class;

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
