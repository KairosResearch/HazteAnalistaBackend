<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCualitativoComunidad;

class AnalisisCualitativoComunidadController extends Controller
{
    public function getCualitativoComunidad(){
        $comunidad = AnalisisCualitativoComunidad::select('id','item','value')->get();
        return response()->json(['comunidades' => $comunidad],200);
    }
}
