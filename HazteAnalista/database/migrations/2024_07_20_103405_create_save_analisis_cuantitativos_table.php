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
        Schema::create('save_analisis_cuantitativos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_tokenomic');
            $table->unsignedBigInteger('id_movimientosOnChain');
            $table->unsignedBigInteger('id_metricasExchage');
            $table->unsignedBigInteger('id_financiamitos');

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tokenomic')->references('id')->on('analisis_cuantitativo_tokenomics')->onDelete('cascade');
            $table->foreign('id_movimientosOnChain')->references('id')->on('analisis_cuantitativo_movimientos_on_chains')->onDelete('cascade');
            $table->foreign('id_metricasExchage')->references('id')->on('analisis_cuantitativo_metricas_exchanges')->onDelete('cascade');
            $table->foreign('id_financiamitos')->references('id')->on('analisis_cuantitativo_financieros')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('save_analisis_cuantitativos');
    }
};
