<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class decisionPoyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('decision_proyecto')->insert(['id' => 1,'descripcion' => "Ninguno"]);
        DB::table('decision_proyecto')->insert(['id' => 2,'descripcion' => "Invertir"]);
        DB::table('decision_proyecto')->insert(['id' => 3,'descripcion' => "Watchlist"]);
        DB::table('decision_proyecto')->insert(['id' => 4,'descripcion' => "Descartar"]);
    }
}
