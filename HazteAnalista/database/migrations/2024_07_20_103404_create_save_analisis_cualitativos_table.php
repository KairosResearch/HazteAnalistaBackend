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
        Schema::create('save_analisis_cualitativos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_proyecto');
            $table->unsignedBigInteger('id_caso_uso');
            $table->unsignedBigInteger('id_integrantes_equipo');
            $table->unsignedBigInteger('id_auditoria');
            $table->unsignedBigInteger('id_roadmap');
            $table->unsignedBigInteger('id_comunidad');
            $table->unsignedBigInteger('id_financiamiento');
            $table->unsignedBigInteger('id_whitepapaers');
            $table->unsignedBigInteger('id_alianzas');
            
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_proyecto')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('id_caso_uso')->references('id')->on('analisis_cualitativo_caso_usos')->onDelete('cascade');
            $table->foreign('id_integrantes_equipo')->references('id')->on('analisis_cualitativo_integrantes_equipos')->onDelete('cascade');
            $table->foreign('id_auditoria')->references('id')->on('analisis_cualitativo_auditorias')->onDelete('cascade');
            $table->foreign('id_roadmap')->references('id')->on('analisis_cualitativo_roadmaps')->onDelete('cascade');
            $table->foreign('id_comunidad')->references('id')->on('analisis_cualitativo_comunidades')->onDelete('cascade');
            $table->foreign('id_financiamiento')->references('id')->on('analisis_cualitativo_financiamientos')->onDelete('cascade');
            $table->foreign('id_whitepapaers')->references('id')->on('analisis_cualitativo_whitepapaers')->onDelete('cascade');
            $table->foreign('id_alianzas')->references('id')->on('analisis_cualitativo_alianzas')->onDelete('cascade');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_analisis_cualitativos');
    }
};
