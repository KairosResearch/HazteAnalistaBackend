<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class catalog4eSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('catalogo4e')->insert(['id' => 1,'descripcion' => "Encontrar"]);
        DB::table('catalogo4e')->insert(['id' => 2,'descripcion' => "Estudiar"]);
        DB::table('catalogo4e')->insert(['id' => 3,'descripcion' => "Ejecutar"]);
        DB::table('catalogo4e')->insert(['id' => 4,'descripcion' => "Evaluar"]);
    }
}
