<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;

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
      
        
        Route::group(['middleware' => 'auth:api'], function() {
            Route::get('logout', [LoginController::class, 'logout']);
            Route::get('user', [LoginController::class, 'user']);
        });

    });
    