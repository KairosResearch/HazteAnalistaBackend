<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCualitativoFinanciamiento;

class AnalisisCualitativoFinanciamientoController extends Controller
{
    public function getCualitativoFinanziamiento(){
        $finanziamento = AnalisisCualitativoFinanciamiento::select('id','item','value')->get();
        return response()->json(['finanziamentos' => $finanziamento],200);
    }
}
