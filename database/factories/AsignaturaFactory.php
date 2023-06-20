<?php

namespace Database\Factories;

use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturaFactory extends Factory
{
    protected $model = Asignatura::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nivel = $this->faker->randomElement(['primaria', 'secundaria']);
        $grado = $nivel == 'primaria' ? $this->faker->randomElement(['1', '2', '3', '4', '5', '6']) : $this->faker->randomElement(['1', '2', '3', '4', '5']);
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'nivel' => $nivel,
            'grado' => $grado,
        ];
    }
}
