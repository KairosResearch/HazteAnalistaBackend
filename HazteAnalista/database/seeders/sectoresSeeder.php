<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class sectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sectores')->insert(['id' => 1,'descripcion' => "DAO"]);
        DB::table('sectores')->insert(['id' => 2,'descripcion' => "Defi"]);
        DB::table('sectores')->insert(['id' => 3,'descripcion' => "Blockchain"]);
        DB::table('sectores')->insert(['id' => 4,'descripcion' => "NFT"]);
        DB::table('sectores')->insert(['id' => 5,'descripcion' => "Metaverse"]);
        DB::table('sectores')->insert(['id' => 6,'descripcion' => "Web3"]);
        DB::table('sectores')->insert(['id' => 7,'descripcion' => "Oraculo"]);
        DB::table('sectores')->insert(['id' => 8,'descripcion' => "DEX"]);
        DB::table('sectores')->insert(['id' => 9,'descripcion' => "Lending"]);
        DB::table('sectores')->insert(['id' => 10,'descripcion' => "Staking"]);
        DB::table('sectores')->insert(['id' => 11,'descripcion' => "Gaming"]);
        DB::table('sectores')->insert(['id' => 12,'descripcion' => "Marketplace"]);
    }
}
