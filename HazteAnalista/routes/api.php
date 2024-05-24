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

        Route::post('login', [LoginController::class, 'login']);
        Route::post('signup', [LoginController::class, 'signUp']);

        Route::get('catalogo4t', [Api4eController::class, 'getCat4t']);
        Route::get('catDecinesProyec', [ApiDecisionProyectoController::class, 'getCatDecisionProyecto']);
        Route::get('catexchange', [ApiExchangesController::class, 'getCatExchanges']);
        Route::get('catSectores', [ApiSectoresController::class, 'getCatSectores']);
        
        Route::get('getProyectos',[ProyectosController::class, 'getProyectos']);
        Route::get('getProyecto/{symbol}/{moneda}',[ProyectosController::class, 'getProyecto']);
      
        
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', [LoginController::class, 'logout']);
        Route::get('user', [LoginController::class, 'user']);
        Route::post('saveProyectSegmto',[ApiProyectoSeguimientoController::class, 'saveProytecto']);

        Route::delete('delteProject', [ApiProyectoSeguimientoController::class, 'deleteProject']);
        Route::put('update_project',[ApiProyectoSeguimientoController::class,'updateProyect']);
    });

    });
    