<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidato_plazas', function (Blueprint $table) {
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedBigInteger('plaza_id');
            $table->enum('estado', ['pendiente', 'en revision', 'aprobado', 'rechazado']);
            $table->date('fecha_postulacion');
            $table->primary(['candidato_id', 'plaza_id']);
            $table->foreign('candidato_id')->references('id')->on('candidatos')->onDelete('cascade');
            $table->foreign('plaza_id')->references('id')->on('plazas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidato_plazas');
    }
};
