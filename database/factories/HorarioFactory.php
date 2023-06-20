<?php

namespace Database\Factories;

use App\Models\Asignatura;
use App\Models\CargaHoraria;
use App\Models\Colaborador;
use App\Models\Horario;
use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    protected $model = Horario::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hora_inicio = $this->faker->time('H:i:s');
        $hora_fin = Date('H:i:s', strtotime($hora_inicio . ' + 2 hour'));
        return [
            'colaborador_id' => Colaborador::inRandomOrder()->first()->id,
            'carga_horaria_id' => CargaHoraria::inRandomOrder()->first()->id,
            'dia_semana' => $this->faker->randomElement(['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado']),
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin,
            'asignatura_id' => Asignatura::inRandomOrder()->first()->id,
        ];
    }
}
