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
        //
        Schema::create('proyecto_seguimiento', function (Blueprint $table) {
            $table->id();
            
            $table->integer('idUsuario');
            $table->string('nombre');
            $table->string('ticket');
            $table->unsignedBigInteger('id4e');
            $table->unsignedBigInteger('id_decision_proyecto');
            $table->bigInteger('marketCap');
            $table->integer('siAth');
            $table->unsignedBigInteger('idExchange');
            $table->unsignedBigInteger('idSector');
            $table->double('precioEntrada');
            $table->double('precioActual');

            $table->foreign('id4e')->references('id')->on('catalogo4e')->onDelete('cascade');
            $table->foreign('id_decision_proyecto')->references('id')->on('decision_proyecto')->onDelete('cascade');
            $table->foreign('idExchange')->references('id')->on('exchanges')->onDelete('cascade');
            $table->foreign('idSector')->references('id')->on('sectores')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('proyecto_seguimiento');
    }
};
