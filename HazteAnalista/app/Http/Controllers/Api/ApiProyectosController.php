<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Proyectos;

class ApiProyectosController extends Controller
{
 
    public function getInfoProyecto(Request $request){
        $id_projecto = $request->idProyecto;
        
        $proyectosInformacion = DB::table('proyectos')
        ->select('proyectos.id','proyectos.proyecto','proyectos.ticker','proyectos.descripcion','proyectos.descripcion','proyectos.website','proyectos.link_analisis_kairos','proyectos.documentacion','proyectos.twitter','proyectos.github','proyectos.discord','proyectos.ultima_ronda','proyectos.financiamiento','proyectos.inversionista1','proyectos.inversionista2','proyectos.inversionista3','proyectos.status')
        ->where('proyectos.id',$id_projecto)
        ->get();

        return response()->json(['proyectosInfo' => $proyectosInformacion], 200);
    }   
}
