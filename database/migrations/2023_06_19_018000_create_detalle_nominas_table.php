<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleNominasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_nominas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomina_id');
            $table->timestamps();

            $table->foreign('nomina_id')->references('id')->on('nominas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_nominas');
    }
}
