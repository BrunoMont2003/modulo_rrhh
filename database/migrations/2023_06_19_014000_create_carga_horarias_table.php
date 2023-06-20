<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaHorariasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carga_horarias', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->unsignedInteger('horas_semana');
            $table->unsignedInteger('horas_mensuales');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carga_horarias');
    }
}
