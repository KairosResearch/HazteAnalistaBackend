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
use Hamcrest\Type\IsNumeric;

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

    public function getTokenBalancesArb($wallet,$moneda){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://arb-mainnet.g.alchemy.com/v2/p2W2C5w4TDjDP8Cj3zn1-A8Z83Mmnm58', [
        'body' => '{"id":1,"jsonrpc":"2.0","method":"alchemy_getTokenBalances","params":["'.$wallet.'"]}',
        'headers' => [
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ],
        ]);
        $valance =  json_decode($response->getBody());
        $Tokens = $valance->result->tokenBalances;
        
        $contratosSeleccionados = array("0x82af49447d8a07e3bd95bd0d56f35241523fbab1","0x912ce59144191c1204e64559fe8253a0e49e6548","0xaf88d065e77c8cc2239327c5edb3a432268e5831","0xda10009cbd5d07dd0cecc66161fc93d7c9000da1","0xfd086bc7cd5c481dcc9c85ebe478a1c0b69fcbb9","0xff970a61a04b1ca14834a43f5de4533ebddb5cc8");

        $totalBalance = 0;
        $tokenInfo = array();
        foreach($Tokens as $token){
            $balance = $token->tokenBalance;
            $balance = hexdec($balance);
            if(in_array($token->contractAddress,$contratosSeleccionados) and $balance !=0){
                $llamada      = $this->getMetaData($token->contractAddress);
                $decimals     = $llamada->result->decimals;
                $balance      = $balance/pow(10, $decimals);
                $monto        = $balance * $this->getValueCripto($llamada->result->symbol,$moneda);
                $valorCrypto  = $this->getValueCripto($llamada->result->symbol,$moneda);
                $totalBalance = $totalBalance + $monto;
                $tokenInfo[] = array(
                    'logo'            => $llamada->result->logo ,
                    'simbolo'         => $llamada->result->symbol,
                    'balanceCrypto'   => $balance,
                    'balanceFiat'     => $monto,
                    'valorUnitCrypto' => $valorCrypto
                );
            }   
        }
        $valorNativoEHT = hexdec($this->getEthBalance($wallet)->result)/pow(10, 18); 
        $montoETH=0;
        if($valorNativoEHT != 0){
            $montoETH        = $valorNativoEHT * $this->getValueCripto("ETH",$moneda);
            $valorCrypto     = $this->getValueCripto("ETH",$moneda);
            $tokenInfo[]=array(
                'logo'=>"https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png",
                'simbolo'=>"ETH",
                'balanceCrypto'=>$valorNativoEHT,
                'balanceFiat'     => $montoETH,
                'valorUnitCrypto' => $valorCrypto
            );
        }
        return response()->json(["Balances"=>$tokenInfo, "TotalBalance"=>$totalBalance+$montoETH]);
    }

    public function getTokenBalancesScrol($wallet,$moneda){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://scroll-mainnet.g.alchemy.com/v2/p2W2C5w4TDjDP8Cj3zn1-A8Z83Mmnm58', [
        'body' => '{"id":1,"jsonrpc":"2.0","method":"alchemy_getTokenBalances","params":["'.$wallet.'"]}',
        'headers' => [
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ],
        ]);
        $valance =  json_decode($response->getBody());
        $Tokens = $valance->result->tokenBalances;
        
        $contratosSeleccionados = array("0x82af49447d8a07e3bd95bd0d56f35241523fbab1","0x912ce59144191c1204e64559fe8253a0e49e6548","0xaf88d065e77c8cc2239327c5edb3a432268e5831","0xda10009cbd5d07dd0cecc66161fc93d7c9000da1","0xfd086bc7cd5c481dcc9c85ebe478a1c0b69fcbb9","0xff970a61a04b1ca14834a43f5de4533ebddb5cc8");

        $totalBalance = 0;
        $tokenInfo = array();
        foreach($Tokens as $token){
            $balance = $token->tokenBalance;
            $balance = hexdec($balance);
            if(in_array($token->contractAddress,$contratosSeleccionados) and $balance !=0){
                $llamada      = $this->getMetaData($token->contractAddress);
                $decimals     = $llamada->result->decimals;
                $balance      = $balance/pow(10, $decimals);
                $monto        = $balance * $this->getValueCripto($llamada->result->symbol,$moneda);
                $valorCrypto  = $this->getValueCripto($llamada->result->symbol,$moneda);
                $totalBalance = $totalBalance + $monto;
                $tokenInfo[] = array(
                    'logo'            => $llamada->result->logo ,
                    'simbolo'         => $llamada->result->symbol,
                    'balanceCrypto'   => $balance,
                    'balanceFiat'     => $monto,
                    'valorUnitCrypto' => $valorCrypto
                );
            }   
        }
        $valorNativoEHT = hexdec($this->getEthBalance($wallet)->result)/pow(10, 18); 
        $montoETH=0;
        if($valorNativoEHT != 0){
            $montoETH        = $valorNativoEHT * $this->getValueCripto("ETH",$moneda);
            $valorCrypto     = $this->getValueCripto("ETH",$moneda);
            $tokenInfo[]=array(
                'logo'=>"https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png",
                'simbolo'=>"ETH",
                'balanceCrypto'=>$valorNativoEHT,
                'balanceFiat'     => $montoETH,
                'valorUnitCrypto' => $valorCrypto
            );
        }
        return response()->json(["Balances"=>$tokenInfo, "TotalBalance"=>$totalBalance+$montoETH]);
    }

    public function comparativaMarketCap($tokenA,$tokenB,$moneda){
        $McTa = $this->getMarketCap($tokenA,$moneda);
        $McTb = $this->getMarketCap($tokenB,$moneda);
        $PTa  = $this->getValueCripto($tokenA,$moneda); 
        $PTb  = $this->getValueCripto($tokenB,$moneda); 
        $comparativa = array();
        
        $ProjectPrecio = ($McTb/$McTa)* $PTa;
        
        $NoX = ($ProjectPrecio /$PTa);
        $porcentajeX = (($ProjectPrecio-$PTa)/$PTa) * 100;
        $progreso = ($McTb/$McTa)*100;
        
        
        $comparativa[] = array(
            'MakCapA' => $McTa,
            'MakCapB' => $McTb,
            'ProyecPrecio' => $ProjectPrecio,
            'NoX' => $NoX,
            'PorcentajeX' => $porcentajeX,
            'Progreso' => $progreso
        );
        return response()->json(["comparativa"=>$comparativa]);
    }

    public function getMetaData($metaData){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://arb-mainnet.g.alchemy.com/v2/p2W2C5w4TDjDP8Cj3zn1-A8Z83Mmnm58', [
            'body' => '{"id":1,"jsonrpc":"2.0","method":"alchemy_getTokenMetadata","params":["'.$metaData.'"]}',
            'headers' => [
              'accept' => 'application/json',
              'content-type' => 'application/json',
            ],
          ]);
        return json_decode($response->getBody());
    }

    public function getEthBalance($account){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://arb-mainnet.g.alchemy.com/v2/p2W2C5w4TDjDP8Cj3zn1-A8Z83Mmnm58', [
            'body' => '{"id":1,"jsonrpc":"2.0","params":["'.$account.'","latest"],"method":"eth_getBalance"}',
            'headers' => [
              'accept' => 'application/json',
              'content-type' => 'application/json',
            ],
          ]);

        return json_decode($response->getBody());

    }

    public function getValueCripto($simbolo,$moneda){
        $url = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/quotes/latest';
        //print($simbolo);
        if($simbolo == "USDC.e"){
            $simbolo=18852;
            $parameters = [
                'id'  => $simbolo, 
                'convert' => $moneda
            ];
        }else{
            $parameters = [
                'symbol'  => $simbolo, 
                'convert' => $moneda
            ];
        }
        

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: a3d40011-8f49-4c61-8707-62b34bee12ea' 
        ];

        $query = http_build_query($parameters);
        $request = "{$url}?{$query}";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers, 
            CURLOPT_RETURNTRANSFER => 1
        ));
        $response = curl_exec($curl);
        //print($response);
        curl_close($curl);
        $data = json_decode($response, true);
        
        $price = $data;
        if(is_numeric($simbolo)){
            $price=$price['data'][$simbolo]['quote'][$moneda]['price'];
        }else{
            $price=$price['data'][$simbolo]['0']['quote'][$moneda]['price'];
        }

        //print($simbolo." - ".$price."\n");

        return $price;
    }

    public function getMarketCap($simbolo,$moneda){
        $url = 'https://pro-api.coinmarketcap.com/v2/cryptocurrency/quotes/latest';
        //print($simbolo);
        if($simbolo == "USDC.e"){
            $simbolo=18852;
            $parameters = [
                'id'  => $simbolo, 
                'convert' => $moneda
            ];
        }else{
            $parameters = [
                'symbol'  => $simbolo, 
                'convert' => $moneda
            ];
        }
        

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: a3d40011-8f49-4c61-8707-62b34bee12ea' 
        ];

        $query = http_build_query($parameters);
        $request = "{$url}?{$query}";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers, 
            CURLOPT_RETURNTRANSFER => 1
        ));
        $response = curl_exec($curl);
        //print($response);
        curl_close($curl);
        $data = json_decode($response, true);
        
        $mc = $data;
        if(is_numeric($simbolo)){
            $mc=$mc['data'][$simbolo]['quote'][$moneda]['market_cap'];
        }else{
            $mc=$mc['data'][$simbolo]['0']['quote'][$moneda]['market_cap'];
        }

        //print($simbolo." - ".$price."\n");

        return $mc;

    }
}

