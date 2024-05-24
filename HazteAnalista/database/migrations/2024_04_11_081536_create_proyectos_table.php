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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();

            $table->string('proyecto');
            $table->string('ticker');
            $table->text('descripcion');
            $table->string('website');
            $table->string('link_analisis_kairos');
            $table->string('documentacion');
            $table->string('twitter');
            $table->string('github');
            $table->string('discord');
            $table->string('ultima_ronda');
            $table->bigInteger('financiamiento');
            $table->string('inversionista1');
            $table->string('inversionista2');
            $table->string('inversionista3');
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
