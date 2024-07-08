<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lecciones;
use App\Models\ModulosLecciones;

class LeccionesController extends Controller
{
    public function getLecciones(){

        $InfoTratada = [];
        
        $modulos = ModulosLecciones::select('id','nombre')
        ->where('status',1)
        ->get();

        $lecciones = Lecciones::select('id','id_modulo','numero_leccion','leccion','html_portada','html_leccion')
        ->where('status',1)
        ->get();
        
        foreach($modulos as $key => $value){
            foreach($lecciones as $keyl => $value1){
               if($value->id == $value1->id_modulo){
                if (!isset($InfoTratada[$key])) {
                   $InfoTratada[$value->nombre][] = $value1;
                }
               } 
            }
        }
        
        $jsonData = json_encode($InfoTratada,  JSON_PRETTY_PRINT |   JSON_UNESCAPED_UNICODE);

        return response()->json($InfoTratada);
    }
}
