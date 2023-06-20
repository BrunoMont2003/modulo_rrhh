<?php

namespace Database\Factories;

use App\Models\DetalleNomina;
use App\Models\Sueldo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SueldoFactory extends Factory
{
    protected $model = Sueldo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $detalle_nomina = DetalleNomina::doesntHave('descuento')->doesntHave('prestacion')->doesntHave('sueldo')->inRandomOrder()->first();
        return [
            'detalle_nomina_id' => $detalle_nomina->id,
            'monto' => $this->faker->randomFloat(2, 0, 99999),
        ];
    }
}
