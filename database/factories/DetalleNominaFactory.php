<?php

namespace Database\Factories;

use App\Models\DetalleNomina;
use App\Models\Nomina;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleNominaFactory extends Factory
{
    protected $model = DetalleNomina::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomina_id' => Nomina::inRandomOrder()->first()->id,
        ];
    }
}
