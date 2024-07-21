<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CualitativoComunidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cualitativo_comunidades')->insert(['id' => 1,'item' => "Tiene actividad continua en redes sociales",'value' => 2.5 ]);
        DB::table('analisis_cualitativo_comunidades')->insert(['id' => 2,'item' => "Cuenta con una comunidad solida de respaldo",'value' => 5.0 ]);
        DB::table('analisis_cualitativo_comunidades')->insert(['id' => 3,'item' => "Dan sus actualizaciones constantemente",'value' => 2.5 ]);
    }
}
