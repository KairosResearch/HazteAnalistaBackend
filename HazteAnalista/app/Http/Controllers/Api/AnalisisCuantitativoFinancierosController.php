<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCuantitativoFinancieros;

class AnalisisCuantitativoFinancierosController extends Controller
{
    public function getCuantitativoWhitePapaer(){
        $whitepapear = AnalisisCuantitativoFinancieros::select('id','item','value')->get();
        return response()->json(['whitepapear' => $whitepapear],200);
    }
}
