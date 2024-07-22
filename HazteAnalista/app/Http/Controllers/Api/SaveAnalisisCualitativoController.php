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
        $idCasoUso           = $request->idCasoUso;
        $idIntegrantesEquipo = $request->idIntegrantesEquipo; 
        $idAuditoria         = $request->idAuditoria; 
        $id_roadmap          = $request->idRoadmap;
        $id_comunidad        = $request->idComunidad;
        $id_financiamiento   = $request->idFinanciamiento;
        $id_whitepapaers     = $request->idWhitepapaers;
        $id_alianzas         = $request->idAlianzas;

        
        SaveAnalisisCualitativo::create([
            'id_usuario'            => $idUsuario ,
            'id_caso_uso'           => $idCasoUso,
            'id_integrantes_equipo' => $idIntegrantesEquipo,
            'id_auditoria'          => $idAuditoria,
            'id_roadmap'            => $id_roadmap,
            'id_comunidad'          => $id_comunidad,
            'id_financiamiento'     => $id_financiamiento,
            'id_whitepapaers'       => $id_whitepapaers,
            'id_alianzas'           => $id_alianzas,
        ]);

        return response()->json(['message' => 'Analisis Cualitativo guardado exitosamente!'], 201);
    }

    public function updateAnalisisCualitativo(Request $request){
        $idUsuario           = $request->idUsuario;
        $idCasoUso           = $request->idCasoUso;
        $idIntegrantesEquipo = $request->idIntegrantesEquipo; 
        $idAuditoria         = $request->idAuditoria; 
        $id_roadmap          = $request->idRoadmap;
        $id_comunidad        = $request->idComunidad;
        $id_financiamiento   = $request->idFinanciamiento;
        $id_whitepapaers     = $request->idWhitepapaers;
        $id_alianzas         = $request->idAlianzas;

        $updateAnalisiCuantitavivo =SaveAnalisisCualitativo::where('id_usuario',$idUsuario)
        ->update([
            'id_usuario'=>$idUsuario,
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
    }
}
