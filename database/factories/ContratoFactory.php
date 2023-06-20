<?php

namespace Database\Factories;

use App\Models\Contrato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratoFactory extends Factory
{
    protected $model = Contrato::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_contrato' => $this->faker->randomElement(['tiempo completo', 'medio tiempo']),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->optional(0.3)->date(),
            'descripcion' => $this->faker->text,
            'remuneracion' => $this->faker->randomFloat(2, 1000, 10000),
        ];
    }
}
