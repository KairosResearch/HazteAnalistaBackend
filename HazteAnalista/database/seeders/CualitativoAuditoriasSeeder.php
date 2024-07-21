<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CualitativoAuditoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cualitativo_auditorias')->insert(['id' => 1,'item' => "Auditorías técnicas confiables para la seguridad de smart contracts.",'value' => 5 ]);
    }
}
