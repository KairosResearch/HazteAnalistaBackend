<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CualitativoAlianzasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    DB::table('analisis_cualitativo_alianzas')->insert(['id' => 1,'item' => "Cuenta con alianzas estrategicas que los pueden impulsar a largo plazo",'value' => 3.5 ]);
        
    }
}
