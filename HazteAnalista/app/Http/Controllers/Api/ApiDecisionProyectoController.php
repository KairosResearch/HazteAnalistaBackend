<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDecisionProyectoController extends Controller
{
    public function getCatDecisionProyecto(){
        $deciporyect = DB::table('decision_proyecto')->select('id as value','descripcion as label')
        ->orderBy('id')
        ->get();
        return response()->json(['decesiproyecto' => $deciporyect],200);
       } 
}
