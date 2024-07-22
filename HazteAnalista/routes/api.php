<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\Api4eController;
use App\Http\Controllers\Api\ApiDecisionProyectoController;
use App\Http\Controllers\Api\ApiExchangesController;
use App\Http\Controllers\Api\ApiSectoresController;
use App\Http\Controllers\Api\ApiProyectoSeguimientoController;
use App\Http\Controllers\Api\ProyectosController;
use App\Http\Controllers\Api\ApiRegistroController;
use App\Http\Controllers\Api\ApiProyectosController;
use App\Http\Controllers\Api\LeccionesController;
use App\Http\Controllers\Api\UltimasLeccionesController;

use App\Http\Controllers\Api\AnalisisCualitativoAlianzasController;
use App\Http\Controllers\Api\AnalisisCualitativoAudotoriasController;
use App\Http\Controllers\Api\AnalisisCualitativoCasoUsoController;
use App\Http\Controllers\Api\AnalisisCualitativoComunidadController;
use App\Http\Controllers\Api\AnalisisCualitativoFinanciamientoController;
use App\Http\Controllers\Api\AnalisisCualitativoIntegrantesEquipoController;
use App\Http\Controllers\Api\AnalisisCualitativoRoadmapController;
use App\Http\Controllers\Api\AnalisisCualitativoWhitepapaerController;

use App\Http\Controllers\Api\AnalisisCuantitativoFinancierosController;
use App\Http\Controllers\Api\AnalisisCuantitativoMetricasExchangesController;
use App\Http\Controllers\Api\AnalisisCuantitativoMovimientosOnChainController;
use App\Http\Controllers\Api\AnalisisCuantitativoTokenomicsController;

use App\Http\Controllers\Api\SaveAnalisisCualitativoController;
use App\Http\Controllers\Api\SaveAnalisisCuantitativoController;
use App\Models\SaveAnalisisCuantitativo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



    Route::group(['prefix' => 'auth'], function () {

        /*Route::post('login', [LoginController::class, 'login']);
        Route::post('signup', [LoginController::class, 'signUp']);*/
        Route::post('registro', [ApiRegistroController::class,'registro']);
        Route::post('login', [LoginController::class, 'login']);
        Route::get('user', [LoginController::class, 'user']);
        
        Route::get('catalogo4t', [Api4eController::class, 'getCat4t']);
        Route::get('catDecinesProyec', [ApiDecisionProyectoController::class, 'getCatDecisionProyecto']);
        Route::get('catexchange', [ApiExchangesController::class, 'getCatExchanges']);
        Route::get('catSectores', [ApiSectoresController::class, 'getCatSectores']);
        
        Route::get('getProyectos',[ProyectosController::class, 'getProyectos']);
        Route::get('getProyecto/{symbol}/{moneda}',[ProyectosController::class, 'getProyecto']);

        Route::post('saveProyectSegmto',[ApiProyectoSeguimientoController::class, 'saveProytecto']);
        Route::delete('delteProject', [ApiProyectoSeguimientoController::class, 'deleteProject']);
        Route::put('update_project',[ApiProyectoSeguimientoController::class,'updateProyect']);

        Route::get('getProyectosSegUsuario/{idUsuario}',[ApiProyectoSeguimientoController::class,'getProyectos']);
        Route::get('getInfoProyecto/{idProyecto}',[ApiProyectosController::class,'getInfoProyecto']);

        Route::get('getLecciones/{idUsuario}',[LeccionesController::class,'getLecciones']);
        Route::post('update_leccion_estatus',[LeccionesController::class,'update_leccion_estatus']);
        
        Route::put('setUltimaLeccion',[LeccionesController::class,'setUltimaLeccion']);
        Route::get('get_ultima_leccion/{idUsuario}',[UltimasLeccionesController::class,'get_ultima_leccion']);
        Route::put('set_ultima_leccion',[UltimasLeccionesController::class,'set_ultima_leccion']);

        Route::delete('deleteMasivo',[ApiProyectoSeguimientoController::class,'deleteMasivo']);

        Route::get('getCualitativo_alianzas',[AnalisisCualitativoAlianzasController::class,'getCualitativoAlianza']);
        Route::get('getCualitativo_audotorias',[AnalisisCualitativoAudotoriasController::class,'getCualitativoAudotoria']);
        Route::get('getCualitativo_caso_uso',[AnalisisCualitativoCasoUsoController::class,'getCualitativoCasoUso']);
        Route::get('getCualitativo_comunidad',[AnalisisCualitativoComunidadController::class,'getCualitativoComunidad']);
        Route::get('getCualitativo_financiamiento',[AnalisisCualitativoFinanciamientoController::class,'getCualitativoFinanziamiento']);
        Route::get('getCualitativo_integrantes_equipo',[AnalisisCualitativoIntegrantesEquipoController::class,'getCualitativoIntegrantesEquipo']);
        Route::get('getCualitativo_roadmap',[AnalisisCualitativoRoadmapController::class,'getCualitativoRoadmap']);
        Route::get('getCualitativo_whitepapaer',[AnalisisCualitativoWhitepapaerController::class,'getCualitativoWhitePapaer']);

        Route::get('getCuantitativo_financieros',[AnalisisCuantitativoFinancierosController::class,'getCuantitativoFinanciamiento']);
        Route::get('getCuantitativo_metricas_xchanges',[AnalisisCuantitativoMetricasExchangesController::class,'getCuantitativoExchanges']);
        Route::get('getCuantitativo_movimientos_OnChain',[AnalisisCuantitativoMovimientosOnChainController::class,'getCuantitativoOnchain']);
        Route::get('getCuantitativo_Tokenomics',[AnalisisCuantitativoTokenomicsController::class,'getCuantitativoTokens']);

        Route::post('saveAnalisisCualitativo',[SaveAnalisisCualitativoController::class,'saveAnalisisCualitativo']);
        Route::post('saveAnalisisCuantitativo',[SaveAnalisisCuantitativoController::class,'saveAnalisisCuantitavo']);

        Route::put('updateAnalisisCualitativo',[SaveAnalisisCualitativoController::class,'updateAnalisisCualitativo']);
        Route::put('updateAnalisisCuantitativo',[SaveAnalisisCuantitativoController::class,'updateAnalisisCuantitativo']);

        Route::get('getAnalisisCualitativo/{idUsuario}',[SaveAnalisisCualitativoController::class,'getAnalisisCualitativo']);
        Route::get('getAnalisisCuantitativo/{idUsuario}',[SaveAnalisisCuantitativoController::class,'getAnalisisCuantitativo']);


        
        /*Route::group(['middleware' => 'auth:api'], function() {
            Route::get('logout', [LoginController::class, 'logout']);
            Route::get('user', [LoginController::class, 'user']);
        });*/

    });
    