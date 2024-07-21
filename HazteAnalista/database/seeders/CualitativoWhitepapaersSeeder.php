<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CualitativoWhitepapaersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cualitativo_whitepapaers')->insert(['id' => 1,'item' => "Información detallada sobre propuesta de valor.",'value' => 2.5 ]);
        DB::table('analisis_cualitativo_whitepapaers')->insert(['id' => 2,'item' => "Explicación del funcionamiento técnico tiene sentido.",'value' => 2.5 ]);
    }
}
