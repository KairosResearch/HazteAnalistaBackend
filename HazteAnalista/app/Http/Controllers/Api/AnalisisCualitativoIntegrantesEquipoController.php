<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCualitativoIntegrantesEquipo;

class AnalisisCualitativoIntegrantesEquipoController extends Controller
{
    public function getCualitativoIntegrantesEquipo(){
        $inteEquipo = AnalisisCualitativoIntegrantesEquipo::select('id','item','value')->get();
        return response()->json(['integrantesEquipo' => $inteEquipo],200);
    }
}
