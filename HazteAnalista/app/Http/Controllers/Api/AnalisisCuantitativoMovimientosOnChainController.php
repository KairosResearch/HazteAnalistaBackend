<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCuantitativoMovimientosOnChain;

class AnalisisCuantitativoMovimientosOnChainController extends Controller
{
    public function getCuantitativoOnchain(){
        $onchain = AnalisisCuantitativoMovimientosOnChain::select('id','item','value')->get();
        return response()->json(['onchain' => $onchain],200);
    }
}
