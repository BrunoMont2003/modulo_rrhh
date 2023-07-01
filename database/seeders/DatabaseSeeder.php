<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Asignatura;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EquipoSeeder::class);
        $this->call(PuestoSeeder::class);
        $this->call(ContratoSeeder::class);
        $this->call(AsignaturaSeeder::class);
    }
}
