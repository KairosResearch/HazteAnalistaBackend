<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuantitativoOnChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cuantitativo_movimientos_on_chains')->insert(['id' => 1,'item' => "Existe una forma o herramienta de revisar el registro historico de movimientos, holders, etc",'value' => 2.5]);
        DB::table('analisis_cuantitativo_movimientos_on_chains')->insert(['id' => 2,'item' => "No hay concentración de ballenas.",'value' => 2.5]);
    }
}
