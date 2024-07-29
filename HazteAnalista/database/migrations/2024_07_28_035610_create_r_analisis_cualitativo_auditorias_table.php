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
        Schema::create('r_analisis_cualitativo_auditorias', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('id_anasis_cuali');
            $table->unsignedBigInteger('id_auditorias');

            $table->foreign('id_anasis_cuali','fk_r_cuali_auidi')->references('id')->on('save_analisis_cualitativos')->onDelete('cascade');
            $table->foreign('id_auditorias','fk_auitorias')->references('id')->on('analisis_cualitativo_auditorias')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_analisis_cualitativo_auditorias');
    }
};
