<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colaborador_id');
            $table->unsignedBigInteger('carga_horaria_id');
            $table->enum('dia_semana', ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->unsignedBigInteger('asignatura_id')->nullable();
            $table->timestamps();

            $table->foreign('colaborador_id')->references('id')->on('colaboradores');
            $table->foreign('carga_horaria_id')->references('id')->on('carga_horarias');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
}
