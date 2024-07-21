<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCualitativoAlianzas;

class AnalisisCualitativoAlianzasController extends Controller
{
    public function getCualitativoAlianza(){
        $alianzas = AnalisisCualitativoAlianzas::select('id','item','value')->get();
        return response()->json(['alianzas' => $alianzas],200);
    }
}
