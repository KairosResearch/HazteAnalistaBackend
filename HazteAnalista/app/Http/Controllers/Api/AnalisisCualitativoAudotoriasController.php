<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCualitativoAudotorias;

class AnalisisCualitativoAudotoriasController extends Controller
{
    public function getCualitativoAudotoria(){
        $auditoria= AnalisisCualitativoAudotorias::select('id','item','value')->get();
        return response()->json(['auditorias' => $auditoria],200);
    }
}
