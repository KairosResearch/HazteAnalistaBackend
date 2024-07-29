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
        Schema::create('r_analisis_cualitativo_alianzas', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_anasis_cuali');
            $table->unsignedBigInteger('id_alianzas');

            $table->foreign('id_anasis_cuali','fk_r_cuali_alian')->references('id')->on('save_analisis_cualitativos')->onDelete('cascade');
            $table->foreign('id_alianzas','fk_alianzas')->references('id')->on('analisis_cualitativo_alianzas')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_analisis_cualitativo_alianzas');
    }
};
