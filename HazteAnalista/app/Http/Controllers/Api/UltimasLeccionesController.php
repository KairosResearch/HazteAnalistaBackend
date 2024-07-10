<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UltimasLecciones;




class UltimasLeccionesController extends Controller
{
    public function get_ultima_leccion(Request $request){
        $id_usuario   = $request->idUsuario;
        
        $ultimaLeccion = DB::table('ultimas_lecciones')
        ->join('modulos_lecciones', 'ultimas_lecciones.id_modulo', '=', 'modulos_lecciones.id')
        ->join('lecciones', 'ultimas_lecciones.id_leccion', '=', 'lecciones.id')
        ->select('modulos_lecciones.nombre as modulo','lecciones.leccion as leccion','ultimas_lecciones.fecha','lecciones.html_portada','lecciones.html_leccion')
        ->where('ultimas_lecciones.id_usuario',$id_usuario)
        ->get();

        return response()->json(['UltimaLeccion' => $ultimaLeccion], 200);
    }

    public function set_ultima_leccion(Request $request){
        
            date_default_timezone_set('America/Mexico_City');    
            $id_usuario   = $request->id_usuario;
            $id_modulo    = $request->id_modulo;
            $id_leccion   = $request->id_leccion;

            $exist_las_curso =UltimasLecciones::where('id_usuario',$id_usuario)
            ->exists();

            if($exist_las_curso){
                $update_las_curso =UltimasLecciones::where('id_usuario',$id_usuario)
                ->update(['id_modulo'=>$id_modulo,'id_leccion'=>$id_leccion,'fecha' => date('Y-m-d H:i:s')]);
                return response()->json(['UltimaLeccion' => $update_las_curso], 200);   
            }else{
                $update_las_curso = UltimasLecciones::create([
                    'id_usuario' => $id_usuario,
                    'id_modulo' => $id_modulo,
                    'id_leccion' => $id_leccion,
                    'fecha' => date('Y-m-d H:i:s')
                ]);
                return response()->json(['UltimaLeccion' => $update_las_curso], 200);   
            }
    }
}
