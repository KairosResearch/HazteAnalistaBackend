<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SaveAnalisisCuantitativo;

class SaveAnalisisCuantitativoController extends Controller
{
    public function saveAnalisisCuantitavo(Request $request){
        
            $id_usuario              = $request->idUsuario;
            $id_tokenomic            = $request->idTokenomic;
            $id_movimientosOnChain   = $request->idMovimientosOnChain; 
            $id_metricasExchage      = $request->idMetricasExchange;
            $id_financiamitos        = $request->idFinanciamiento;
    
            $existAnalisis = SaveAnalisisCuantitativo::where('id_usuario',$id_usuario)
            ->exists();
            
            if($existAnalisis){
                return response()->json(['message' => 'Ya se registro un Analisis Cuantitativo para este usuario'], 401);
            }else{
                SaveAnalisisCuantitativo::create([
                    'id_usuario'             => $id_usuario ,
                    'id_tokenomic'           => $id_tokenomic,
                    'id_movimientosOnChain'  => $id_movimientosOnChain,
                    'id_metricasExchage'     => $id_metricasExchage,
                    'id_financiamitos'       => $id_financiamitos,
                ]);
                return response()->json(['message' => 'Analisis Cuantitativo guardado exitosamente!'], 201);
            }
        }
    
    public function updateAnalisisCuantitativo(Request $request){
        $id_usuario              = $request->idUsuario;
        $id_tokenomic            = $request->idTokenomic;
        $id_movimientosOnChain   = $request->idMovimientosOnChain; 
        $id_metricasExchage      = $request->idMetricasExchange;
        $id_financiamitos        = $request->idFinanciamiento;

        $updateAnalisiCuantitavivo =SaveAnalisisCuantitativo::where('id_usuario',$id_usuario)
        ->update([
            'id_tokenomic'=>$id_tokenomic,
            'id_movimientosOnChain'=>$id_movimientosOnChain,
            'id_metricasExchage' => $id_metricasExchage, 
            'id_financiamitos'=> $id_financiamitos
            ]);
        return response()->json(['Upadate Analisis Cuantitavivo exitoso¡' => $updateAnalisiCuantitavivo], 200);
    }

    public function getAnalisisCuantitativo($idUsuario){
        $analisisCuantitativo =  SaveAnalisisCuantitativo::select('id_usuario','id_tokenomic','id_movimientosOnChain','id_metricasExchage','id_financiamitos')
        ->where('id_usuario',$idUsuario)
        ->get();
        return response()->json($analisisCuantitativo, 200);
    }

}

