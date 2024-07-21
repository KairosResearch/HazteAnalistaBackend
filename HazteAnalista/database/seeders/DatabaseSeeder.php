<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\AnalisisCualitativoRoadmapController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
     public function run()
    {
        $this->call([
            catalog4eSeeder::class,
            decisionPoyectoSeeder::class,
            exchangesSeeder::class,
            sectoresSeeder::class,
            ProyectosSeeder::class,
            ModulosLeccionesSeeder::class,
            LeccionesSeeder::class,
            
            CualitativoAlianzasSeeder::class,
            CualitativoAuditoriasSeeder::class,
            CualitativoCasoUsoSeeder::class,
            CualitativoComunidadesSeeder::class,
            CualitativoFinanciamientoSeeder::class,
            CualitativoIntegranEquipoSeeder::class,
            CualitativoRoadmapSeeder::class,
            CualitativoWhitepapaersSeeder::class,
            
            CuantitativoFinanciamientoSeeder::class,
            CuantitativoMetricExchnageSeeder::class,
            CuantitativoOnChangeSeeder::class,
            CuantitativotokenomicsSeeder::class
            
        ]);
    }

}
