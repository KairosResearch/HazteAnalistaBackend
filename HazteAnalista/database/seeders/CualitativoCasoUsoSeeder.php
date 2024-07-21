<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CualitativoCasoUsoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cualitativo_caso_usos')->insert(['id' => 1,'item' => "Claridad de uso de su producto",'value' => 5 ]);
        DB::table('analisis_cualitativo_caso_usos')->insert(['id' => 2,'item' => "Claridad de uso de su token",'value' => 5 ]);
    }
}
