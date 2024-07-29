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
            
            $table->unsignedBigInteger('id_usuarios');
            $table->unsignedBigInteger('id_proyecto');
            $table->float('suma');
            
            $table->foreign('id_usuarios')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_proyecto')->references('id')->on('proyectos')->onDelete('cascade');
            
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
