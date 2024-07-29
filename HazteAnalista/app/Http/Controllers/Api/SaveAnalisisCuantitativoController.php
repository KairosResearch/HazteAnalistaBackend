<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RAnalisis_cualitativo_financiamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SaveAnalisisCuantitativo;
use App\Models\RAnalisis_cuantitativo_financiamiento;
use App\Models\RAnalisis_cuantitativo_movs_metricas_exchange;
use App\Models\RAnalisis_cuantitativo_movs_onchain;
use App\Models\RAnalisis_cuantitativo_tokenomic;


class SaveAnalisisCuantitativoController extends Controller
{
    public function saveAnalisisCuantitavo(Request $request){
        
            $id_usuario              = $request->idUsuario;
            $id_proyecto             = $request->idProyecto;
            $id_tokenomic            = $request->idTokenomic;
            $id_movimientosOnChain   = $request->idMovimientosOnChain; 
            $id_metricasExchage      = $request->idMetricasExchange;
            $id_financiamitos        = $request->idFinanciamiento;
            $suma                    = $request->suma;
    
            $existAnalisis = SaveAnalisisCuantitativo::where('id_usuario',$id_usuario)
            ->where('id_proyecto',$id_proyecto)
            ->exists();
            
            if($existAnalisis){
                return response()->json(['message' => 'Ya se registro un Analisis Cuantitativo para este usuario'], 401);
            }else{
               $SaveCuantitativo =  SaveAnalisisCuantitativo::create([
                    'id_usuario'             => $id_usuario ,
                    'id_proyecto'            => $id_proyecto ,
                    'suma'                   => $suma
                ]);

                foreach($id_tokenomic as $key => $value){
                    RAnalisis_cuantitativo_tokenomic::create([
                        'id_anasis_cuanti' => $SaveCuantitativo->id,
                        'id_tokenomics' => $value
                    ]);
                }

                foreach($id_movimientosOnChain as $key => $value){
                    RAnalisis_cuantitativo_movs_onchain::create([
                        'id_anasis_cuanti' => $SaveCuantitativo->id,
                        'id_movs_onchain' => $value
                    ]);
                }
                
                foreach($id_metricasExchage as $key => $value){
                    RAnalisis_cuantitativo_movs_metricas_exchange::create([
                        'id_anasis_cuanti' => $SaveCuantitativo->id,
                        'id_metrics_exchange' => $value
                    ]);
                }

                foreach($id_financiamitos as $key => $value){
                    RAnalisis_cuantitativo_financiamiento::create([
                        'id_anasis_cuanti' => $SaveCuantitativo->id,
                        'id_financiero' => $value
                    ]);
                }

                return response()->json(['message' => 'Analisis Cuantitativo guardado exitosamente!'], 201);
            }
        }
    
    public function updateAnalisisCuantitativo(Request $request){
        $id_usuario              = $request->idUsuario;
        $id_proyecto             = $request->idProyecto;
        $idAnalisis              = $request->idAnalisis;
        $id_tokenomic            = $request->idTokenomic;
        $id_movimientosOnChain   = $request->idMovimientosOnChain; 
        $id_metricasExchage      = $request->idMetricasExchange;
        $id_financiamitos        = $request->idFinanciamiento;
        $suma                    = $request->suma;

        $existAnalisis = SaveAnalisisCuantitativo::where('id_usuario',$id_usuario)
        ->where('id_proyecto',$id_proyecto)
        ->exists();
        
        if($existAnalisis){
         $updateAnalisiCuantitavivo =SaveAnalisisCuantitativo::where('id_usuario',$id_usuario)
         ->where('id_proyecto',$id_proyecto)
         ->update([
            'suma'=> $suma
          ]);

          RAnalisis_cuantitativo_financiamiento::where('id_anasis_cuanti',$idAnalisis)
          ->delete();

           foreach($id_financiamitos as $key => $value){
                RAnalisis_cuantitativo_financiamiento::create([
                    'id_anasis_cuanti' => $idAnalisis,
                    'id_financiero' => $value
                ]);
            }

           RAnalisis_cuantitativo_movs_metricas_exchange::where('id_anasis_cuanti',$idAnalisis)
           ->delete();

            foreach($id_metricasExchage as $key => $value){
            RAnalisis_cuantitativo_movs_metricas_exchange::create([
                    'id_anasis_cuanti' => $idAnalisis,
                    'id_metrics_exchange' => $value
                ]);
            }

            RAnalisis_cuantitativo_movs_onchain::where('id_anasis_cuanti',$idAnalisis)
           ->delete();

            foreach($id_movimientosOnChain as $key => $value){
            RAnalisis_cuantitativo_movs_onchain::create([
                    'id_anasis_cuanti' => $idAnalisis,
                    'id_movs_onchain' => $value
                ]);
            }

            RAnalisis_cuantitativo_tokenomic::where('id_anasis_cuanti',$idAnalisis)
           ->delete();

            foreach($id_tokenomic as $key => $value){
            RAnalisis_cuantitativo_tokenomic::create([
                    'id_anasis_cuanti' => $idAnalisis,
                    'id_tokenomics' => $value
                ]);
            }

            return response()->json(['Upadate Analisis Cuantitavivo exitoso¡' => $updateAnalisiCuantitavivo], 200);
            
        }else{
            return response()->json(['message' => 'No existe el analsis cuantitivo'], 401); 
        }
    }

    public function getAnalisisCuantitativo($idAnalisis){
        $array = array();
        
        $array['financiamiento']    = $this->getRFinanciamiento($idAnalisis);
        $array['metricasExchange']  = $this->getRExchangesMetrics($idAnalisis);
        $array['onchains']          = $this->getROnchange($idAnalisis);
        $array['tokenomics']        = $this->getRTokenomics($idAnalisis);
        $array['suma']              = $this->getRSuma($idAnalisis);
       

        return response()->json($array, 200);
    }

    public function getRSuma($idAnalisis){
        $arraySuma = array(); 
        $suma = SaveAnalisisCuantitativo::where('id',$idAnalisis)->select('suma')->get();
        foreach($suma as $key=>$value){
            $arraySuma[$key] = $value->suma;
        }
        return $arraySuma;
    }

    public function getRFinanciamiento($idAnalisis){
        $arrayFinanciamiento = array(); 
        $financiamiento = RAnalisis_cuantitativo_financiamiento::where('id_anasis_cuanti',$idAnalisis)->select('id_financiero')->get();
        foreach($financiamiento as $key=>$value){
            $arrayFinanciamiento[$key] = $value->id_financiero;
        }
        return $arrayFinanciamiento;
    }

    public function getRExchangesMetrics($idAnalisis){
        $arrayExchangeMetrics = array(); 
        $exchanges = RAnalisis_cuantitativo_movs_metricas_exchange::where('id_anasis_cuanti',$idAnalisis)->select('id_metrics_exchange')->get();
        foreach($exchanges as $key=>$value){
            $arrayExchangeMetrics[$key] = $value->id_metrics_exchange;
        }
        return $arrayExchangeMetrics;
    }

    public function getROnchange($idAnalisis){
        $arrayOnchange = array(); 
        $onchange = RAnalisis_cuantitativo_movs_onchain::where('id_anasis_cuanti',$idAnalisis)->select('id_movs_onchain')->get();
        foreach($onchange as $key=>$value){
            $arrayOnchange[$key] = $value->id_movs_onchain;
        }
        return $arrayOnchange;
    }

    public function getRTokenomics($idAnalisis){
        $arrayTokenomics = array(); 
        $tokenomics = RAnalisis_cuantitativo_tokenomic::where('id_anasis_cuanti',$idAnalisis)->select('id_tokenomics')->get();
        foreach($tokenomics as $key=>$value){
            $arrayTokenomics[$key] = $value->id_tokenomics;
        }
        return $arrayTokenomics;
    }
}

