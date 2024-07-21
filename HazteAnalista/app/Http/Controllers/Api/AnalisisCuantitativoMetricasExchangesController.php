<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCuantitativoMetricasExchanges;

class AnalisisCuantitativoMetricasExchangesController extends Controller
{
    public function getCuantitativoExchanges(){
        $exchanges = AnalisisCuantitativoMetricasExchanges::select('id','item','value')->get();
        return response()->json(['exchanges' => $exchanges],200);
    }
}
