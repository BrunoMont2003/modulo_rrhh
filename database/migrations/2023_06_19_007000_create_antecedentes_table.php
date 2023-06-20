<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('candidatos');
            $table->enum('tipo', ['educacion', 'experiencia laboral', 'certificaciones', 'idiomas', 'referencias']);
            $table->text('descripcion')->nullable();
            $table->date('fecha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antecedentes');
    }
}
