<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Equipo::factory(5)->create();
        // \App\Models\Puesto::factory(15)->create();
        // \App\Models\Candidato::factory(100)->create();
        // \App\Models\Antecedente::factory(1000)->create();
        \App\Models\Curriculum::factory(300)->create();
        // \App\Models\Plaza::factory(30)->create();
        // \App\Models\OfertaFormal::factory(30)->create();
        // \App\Models\CandidatoPlaza::factory(30)->create();
        // \App\Models\Contrato::factory(30)->create();
        // \App\Models\Colaborador::factory(100)->create();
        // \App\Models\CargaHoraria::factory(100)->create();
        // \App\Models\Asignatura::factory(60)->create();
        // \App\Models\Horario::factory(1000)->create();
        // \App\Models\Nomina::factory(100)->create();
        // \App\Models\DetalleNomina::factory(2000)->create();
        // \App\Models\Descuento::factory(100)->create();
        // \App\Models\Prestacion::factory(900)->create();
        // \App\Models\Sueldo::factory(1000)->create();
    }
}
