<?php

namespace Database\Factories;

use App\Models\Antecedente;
use App\Models\Candidato;
use Illuminate\Database\Eloquent\Factories\Factory;

class AntecedenteFactory extends Factory
{
    protected $model = Antecedente::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidato_id' => Candidato::inRandomOrder()->first()->id,
            'tipo' => $this->faker->randomElement(['educacion', 'experiencia laboral', 'certificaciones', 'idiomas', 'referencias']),
            'descripcion' => $this->faker->paragraph,
            'fecha' => $this->faker->date,
        ];
    }
}
