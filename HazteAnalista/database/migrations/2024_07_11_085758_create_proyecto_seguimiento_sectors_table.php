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
        Schema::create('proyecto_seguimiento_sectors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyecto_seguimiento');
            $table->unsignedBigInteger('id_sector');
            $table->foreign('id_proyecto_seguimiento')->references('id')->on('proyecto_seguimiento')->onDelete('cascade');
            $table->foreign('id_sector')->references('id')->on('sectores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_seguimiento_sectors');
    }
};
