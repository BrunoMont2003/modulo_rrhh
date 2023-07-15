<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tabla = DB::table('users');
        $tabla->insert([
            'name' => 'bruno',
            'email' => 'bruno@gmail.com',
            'password' => bcrypt('12341234'),
        ]);
    }
}
