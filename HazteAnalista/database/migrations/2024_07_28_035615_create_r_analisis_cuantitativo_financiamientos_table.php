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
        Schema::create('r_analisis_cuantitativo_financiamientos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_anasis_cuanti');
            $table->unsignedBigInteger('id_financiero');

            $table->foreign('id_anasis_cuanti','fk_r_cuanti_finan')->references('id')->on('save_analisis_cuantitativos')->onDelete('cascade');
            $table->foreign('id_financiero','fk_cuanti_finan')->references('id')->on('analisis_cuantitativo_financieros')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_analisis_cuantitativo_financiamientos');
    }
};
