<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CualitativoFinanciamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cualitativo_financiamientos')->insert(['id' => 1,'item' => "Estructura de financiamiento sólida y transparente.",'value' => 3.5 ]);
        DB::table('analisis_cualitativo_financiamientos')->insert(['id' => 2,'item' => "Respaldo de inversionistas conocidos. (Angel Investors & Vc’s)",'value' => 3.5 ]);
    }
}
