<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SaveAnalisisCualitativo;

class SaveAnalisisCualitativoController extends Controller
{
    public function saveAnalisisCualitativo(Request $request){
        
        $idUsuario           = $request->idUsuario;
        $idProyecto           = $request->idProyecto;
        $idCasoUso           = $request->idCasoUso;
        $idIntegrantesEquipo = $request->idIntegrantesEquipo; 
        $idAuditoria         = $request->idAuditoria; 
        $id_roadmap          = $request->idRoadmap;
        $id_comunidad        = $request->idComunidad;
        $id_financiamiento   = $request->idFinanciamiento;
        $id_whitepapaers     = $request->idWhitepapaers;
        $id_alianzas         = $request->idAlianzas;
        $promedio            = $request->idPromedio;

        $existAnalisis = SaveAnalisisCualitativo::where('id_usuario',$idUsuario)
        ->where('id_proyecto',$idProyecto)
        ->exists();
        
        if($existAnalisis){
            return response()->json(['message' => 'Ya se registro un Analisis Cualitativo para este usuario'], 401);
        }else{
            SaveAnalisisCualitativo::create([
                'id_usuario'            => $idUsuario ,
                'id_proyecto'           => $idProyecto ,
                'id_caso_uso'           => $idCasoUso,
                'id_integrantes_equipo' => $idIntegrantesEquipo,
                'id_auditoria'          => $idAuditoria,
                'id_roadmap'            => $id_roadmap,
                'id_comunidad'          => $id_comunidad,
                'id_financiamiento'     => $id_financiamiento,
                'id_whitepapaers'       => $id_whitepapaers,
                'id_alianzas'           => $id_alianzas,
                'promedio'              => $promedio,
            ]);
            return response()->json(['message' => 'Analisis Cualitativo guardado exitosamente!'], 201);
        }
    }

    public function updateAnalisisCualitativo(Request $request){
        $idUsuario           = $request->idUsuario;
        $idProyecto          = $request->idProyecto;
        $idCasoUso           = $request->idCasoUso;
        $idIntegrantesEquipo = $request->idIntegrantesEquipo; 
        $idAuditoria         = $request->idAuditoria; 
        $id_roadmap          = $request->idRoadmap;
        $id_comunidad        = $request->idComunidad;
        $id_financiamiento   = $request->idFinanciamiento;
        $id_whitepapaers     = $request->idWhitepapaers;
        $id_alianzas         = $request->idAlianzas;

        $existAnalisis = SaveAnalisisCualitativo::where('id_usuario',$idUsuario)
        ->where('id_proyecto',$idProyecto)
        ->exists();
        
        if($existAnalisis){
            $updateAnalisiCuantitavivo =SaveAnalisisCualitativo::where('id_usuario',$idUsuario)
            ->where('id_proyecto',$idProyecto)
            ->update([
                'id_usuario'=>$idUsuario,
                'id_proyecto'=>$idProyecto,
                'id_caso_uso'=>$idCasoUso,
                'id_integrantes_equipo' => $idIntegrantesEquipo, 
                'id_auditoria'=> $idAuditoria,
                'id_roadmap'=> $id_roadmap,
                'id_comunidad'=> $id_comunidad,
                'id_financiamiento'=> $id_financiamiento,
                'id_whitepapaers'=> $id_whitepapaers,
                'id_alianzas'=> $id_alianzas
                ]);
            return response()->json(['Upadate Analisis Cuantitavivo exitoso¡' => $updateAnalisiCuantitavivo], 200);
        }else{
            return response()->json(['message' => 'No existe el analsis cualitativo'], 401); 
        } 
    }

    public function getAnalisisCualitativo($idUsuario){
        $analisisCualitativo =  SaveAnalisisCualitativo::select('id_usuario','id_proyecto','id_caso_uso','id_integrantes_equipo','id_auditoria','id_roadmap','id_comunidad','id_financiamiento','id_whitepapaers','id_alianzas')
        ->where('id_usuario',$idUsuario)
        ->get();
        return response()->json($analisisCualitativo, 200);
    }
}
