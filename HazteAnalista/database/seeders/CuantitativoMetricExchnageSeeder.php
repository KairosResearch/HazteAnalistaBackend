<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuantitativoMetricExchnageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cuantitativo_metricas_exchanges')->insert(['id' => 1,'item' => "Indicadores de liquidez sólidos.",'value' => 2.5]);
        DB::table('analisis_cuantitativo_metricas_exchanges')->insert(['id' => 2,'item' => "Variedad de exchanges para operar.",'value' => 2.5]);
    }
}
