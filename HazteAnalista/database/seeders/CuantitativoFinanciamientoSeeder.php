<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CuantitativoFinanciamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analisis_cuantitativo_financieros')->insert(['id' => 1,'item' => "Sostenibilidad de su modelo de negocio.",'value' => 10]);
        DB::table('analisis_cuantitativo_financieros')->insert(['id' => 2,'item' => "Generación de ingresos estable y claros.",'value' => 5]);
        DB::table('analisis_cuantitativo_financieros')->insert(['id' => 3,'item' => "Recompensas que se imparte son por su actividad productiva, no por la inflación de su token.",'value' => 10]);
    }
}
