<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class exchangesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exchanges')->insert(['id' => 1,'descripcion' => "Binanses"]);
        DB::table('exchanges')->insert(['id' => 2,'descripcion' => "Coinbase"]);
        DB::table('exchanges')->insert(['id' => 3,'descripcion' => "Kraken"]);
    }
}
