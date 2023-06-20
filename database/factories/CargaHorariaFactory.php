<?php

namespace Database\Factories;

use App\Models\CargaHoraria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CargaHorariaFactory extends Factory
{
    protected $model = CargaHoraria::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->sentence,
            'horas_semana' => $this->faker->numberBetween(20, 40),
            'horas_mensuales' => $this->faker->numberBetween(80, 160),
        ];
    }
}
