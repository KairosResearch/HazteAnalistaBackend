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
        Schema::create('r_analisis_cualitativo_roadmaps', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_anasis_cuanti');
            $table->unsignedBigInteger('id_roadmap');

            $table->foreign('id_anasis_cuanti','fk_r_cuanti_road')->references('id')->on('save_analisis_cualitativos')->onDelete('cascade');
            $table->foreign('id_roadmap','fk_cuanti_roadmap')->references('id')->on('analisis_cualitativo_roadmaps')->onDelete('cascade');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_analisis_cualitativo_roadmaps');
    }
};