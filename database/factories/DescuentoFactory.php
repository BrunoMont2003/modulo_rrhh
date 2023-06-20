<?php

namespace Database\Factories;

use App\Models\Descuento;
use App\Models\DetalleNomina;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescuentoFactory extends Factory
{
    protected $model = Descuento::class;

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
            'concepto' => $this->faker->word,
            'monto' => $this->faker->randomFloat(2, 0, 99999),
            'tipo' => $this->faker->randomElement(['impuesto', 'prestamo', 'contribucion', 'seguro', 'otro']),
        ];
    }
}
