<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lecciones;
use App\Models\ModulosLecciones;

class LeccionesController extends Controller
{
    public function getLecciones(Request $request){

        $InfoTratada = [];
        
        $modulos = ModulosLecciones::select('id','nombre')
        ->where('status',1)
        ->get();

        $lecciones = Lecciones::select('id','id_modulo','numero_leccion','leccion','html_portada','html_leccion')
        ->where('status',1)
        ->get();

        $lecciones_cursadas = DB::table('seguimiento_lecciones')
        ->rightJoin('lecciones','seguimiento_lecciones.id_leccion','=','lecciones.id')
        ->select('seguimiento_lecciones.id_usuario','lecciones.id as id_leccion','lecciones.id_modulo','seguimiento_lecciones.status as siFinalizo')
        ->where('seguimiento_lecciones.id_usuario',$request->idUsuario)
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
        
        return response()->json(["ModulosLecciones"=>$InfoTratada,"isFinalizado"=>$lecciones_cursadas]);
    }
}
