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
        Schema::create('r_analisis_cuantitativo_movs_onchains', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_anasis_cuanti');
            $table->unsignedBigInteger('id_movs_onchain');

            $table->foreign('id_anasis_cuanti','fk_r_cuanti_onchain')->references('id')->on('save_analisis_cuantitativos')->onDelete('cascade');
            $table->foreign('id_movs_onchain','fk_onchain')->references('id')->on('analisis_cuantitativo_movimientos_on_chains')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_analisis_cuantitativo_movs_onchains');
    }
};
