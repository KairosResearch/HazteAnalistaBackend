<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CualitativoIntegranEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cualitativo_integrantes_equipos')->insert(['id' => 1,'item' => "Cuentan con integrantes con experiencia o con repuatción sólida en Web3 o Web2",'value' => 2.5 ]);
    }
}
