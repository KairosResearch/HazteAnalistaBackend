<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CualitativoRoadmapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cualitativo_roadmaps')->insert(['id' => 1,'item' => "Cuenta con al menos 12 a 24 meses de sus planes a futuro",'value' => 3.5 ]);
        DB::table('analisis_cualitativo_roadmaps')->insert(['id' => 2,'item' => "Metas realistas y progreso claro en el roadmap.",'value' => 3.5 ]);
    }
}
