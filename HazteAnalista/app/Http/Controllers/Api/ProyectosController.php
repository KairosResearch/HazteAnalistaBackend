<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Proyectos;

use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Traits\ConsultaApiCoinmarketcapTrait;

class ProyectosController extends Controller
{
    use ConsultaApiCoinmarketcapTrait;
    
    public function getProyectos(){
     $proyectos = Proyectos::select('id','proyecto','ticker')
     ->selectRaw("REPLACE(ticker, '$', '') as symbol")
     ->where('status',1)->get();
     return response()->json(['proyectos' => $proyectos], 200);
    }

    public function getProyecto($symbol,$moneda){

     $response_api_coinmarketcap = $this->consultaApiCoinmarketCap($symbol,$moneda);
     $marketCap = $response_api_coinmarketcap[$symbol]['quote'][$moneda]['market_cap'];
     $price = $response_api_coinmarketcap[$symbol]['quote'][$moneda]['price'];

     $proyecto = Proyectos::select('id','proyecto','ticker')
     ->where('status',1)
     ->where('ticker',"$".$symbol)
     ->get();

     $rec = array(
        'marketCap' => $marketCap,
        'price' => $price,
        "proyecto"=>$proyecto
     );

     return response()->json(['proyecto' => $rec], 200);

    }
}
