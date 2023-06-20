<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colaborador_id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('total_bruto', 10, 2);
            $table->decimal('total_neto', 10, 2);
            $table->enum('estado_pago', ['pendiente', 'pagado']);
            $table->timestamps();

            $table->foreign('colaborador_id')->references('id')->on('colaboradores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominas');
    }
}
