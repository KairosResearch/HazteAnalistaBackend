<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuantitativotokenomicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cuantitativo_tokenomics')->insert(['id' => 1,'item' => "Modelo Económico claro y sostenible",'value' => 5]);
        DB::table('analisis_cuantitativo_tokenomics')->insert(['id' => 2,'item' => "Oferta - Distribución y desbloqueos adecuados",'value' => 5]);
        DB::table('analisis_cuantitativo_tokenomics')->insert(['id' => 3,'item' => "Demanda - Utilidad variada (Evitar que solo sea recompensa)",'value' => 5]);
    }
}
