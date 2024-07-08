<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class modulosLeccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('modulos_lecciones')->insert(['id' =>1,'nombre' => 'Módulo 1','status' => 1]);
        DB::table('modulos_lecciones')->insert(['id' =>2,'nombre' => 'Módulo 2','status' => 1]);
        DB::table('modulos_lecciones')->insert(['id' =>3,'nombre' => 'Módulo 3','status' => 1]);
    }
}
