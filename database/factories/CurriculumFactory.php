<?php

namespace Database\Factories;

use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurriculumFactory extends Factory
{
    protected $model = Curriculum::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidato_id' => \App\Models\Candidato::factory(),
            'titulo' => $this->faker->sentence,
            'enlace' => $this->faker->url,
        ];
    }
}
