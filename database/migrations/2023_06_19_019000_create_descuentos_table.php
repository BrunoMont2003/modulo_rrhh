<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detalle_nomina_id');
            $table->string('concepto');
            $table->decimal('monto', 10, 2);
            $table->enum('tipo', ['impuesto', 'prestamo', 'contribucion', 'seguro', 'otro']);
            $table->timestamps();

            $table->foreign('detalle_nomina_id')->references('id')->on('detalle_nominas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descuentos');
    }
}
