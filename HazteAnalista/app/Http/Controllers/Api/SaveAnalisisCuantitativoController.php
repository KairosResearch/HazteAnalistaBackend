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

