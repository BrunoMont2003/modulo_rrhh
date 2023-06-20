<?php

namespace Database\Factories;

use App\Models\DetalleNomina;
use App\Models\Prestacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrestacionFactory extends Factory
{
    protected $model = Prestacion::class;

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
            'tipo_prestacion' => $this->faker->randomElement(['bonificacion', 'subsidio', 'incentivo', 'otro']),
            'fecha_aplicacion' => $this->faker->date(),
        ];
    }
}
