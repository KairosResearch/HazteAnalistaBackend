<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCualitativoCasoUso;

class AnalisisCualitativoCasoUsoController extends Controller
{
    public function getCualitativoCasoUso(){
        $casoUso= AnalisisCualitativoCasoUso::select('id','item','value')->get();
        return response()->json(['casosUso' => $casoUso],200);
    }
}
