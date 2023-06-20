<?php

namespace Database\Factories;

use App\Models\Colaborador;
use App\Models\Nomina;
use Illuminate\Database\Eloquent\Factories\Factory;

class NominaFactory extends Factory
{
    protected $model = Nomina::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'colaborador_id' => Colaborador::InRandomOrder()->first()->id,
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'total_bruto' => $this->faker->randomFloat(2, 1000, 5000),
            'total_neto' => $this->faker->randomFloat(2, 800, 4000),
            'estado_pago' => $this->faker->randomElement(['pendiente', 'pagado']),
        ];
    }
}
