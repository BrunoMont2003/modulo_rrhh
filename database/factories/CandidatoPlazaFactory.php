<?php

namespace Database\Factories;

use App\Models\Candidato;
use App\Models\CandidatoPlaza;
use App\Models\Plaza;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatoPlazaFactory extends Factory
{
    protected $model = CandidatoPlaza::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidato_id' => Candidato::inRandomOrder()->first()->id,
            'plaza_id' => Plaza::inRandomOrder()->first()->id,
            'estado' => $this->faker->randomElement(['pendiente', 'en revision', 'aprobado', 'rechazado']),
            'fecha_postulacion' => $this->faker->date(),
        ];
    }
}
