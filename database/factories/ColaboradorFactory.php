<?php

namespace Database\Factories;

use App\Models\Candidato;
use App\Models\Colaborador;
use App\Models\Contrato;
use App\Models\Puesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColaboradorFactory extends Factory
{
    protected $model = Colaborador::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $candidatoAprobado = Candidato::whereHas('candidato_plazas', function ($query) {
        //     $query->where('estado', 'aprobado');
        // })->inRandomOrder()->first();

        // return [
        //     'puesto_id' => Puesto::inRandomOrder()->first()->id,
        //     'contrato_id' => Contrato::inRandomOrder()->first()->id,
        //     'nombre' => $candidatoAprobado->nombre,
        //     'dni' => $candidatoAprobado->dni,
        //     'fecha_nacimiento' => $candidatoAprobado->fecha_nacimiento,
        //     'genero' => $candidatoAprobado->genero,
        //     'direccion' => $candidatoAprobado->direccion,
        //     'telefono' => $candidatoAprobado->telefono,
        //     'email' => $candidatoAprobado->email,
        //     'esDocente' => $this->faker->boolean(),
        // ];
        return [
            'puesto_id' => Puesto::inRandomOrder()->first()->id,
            'contrato_id' => Contrato::inRandomOrder()->first()->id,
            'nombre' => $this->faker->name,
            'dni' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'fecha_nacimiento' => $this->faker->date(),
            'genero' => $this->faker->randomElement(['masculino', 'femenino']),
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'esDocente' => $this->faker->boolean,
        ];
    }
}
