<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateProyectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('proyectos')->where('id', 1)->update(['descripcion' => 'Bitcoin ($BTC) es la primera criptomoneda descentralizada, creada en 2009 por una persona o grupo bajo el seudónimo de Satoshi Nakamoto. Funciona sobre una red blockchain pública y abierta que permite realizar transacciones entre pares (peer-to-peer) sin intermediarios como bancos. La emisión de nuevos BTC se realiza mediante minería, un proceso que asegura la red. Es ampliamente reconocida como una reserva de valor y medio de intercambio digital.','website'=> 'https://bitcoin.org/en/','twitter'=> 'N/A','documentacion'=> 'https://developer.bitcoin.org','github'=> 'https://github.com/bitcoin/bitcoin','discord'=> 'N/A','ultima_ronda'=> 'N/A','financiamiento'=> 0,'inversionista1'=> 0,'inversionista2'=> 0,'inversionista3'=> 0]);
    }
}
