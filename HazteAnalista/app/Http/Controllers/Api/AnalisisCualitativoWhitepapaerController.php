<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCualitativoWhitepapaer;

class AnalisisCualitativoWhitepapaerController extends Controller
{
    public function getCualitativoWhitePapaer(){
        $whitePapaer = AnalisisCualitativoWhitepapaer::select('id','item','value')->get();
        return response()->json(['whitepapear' => $whitePapaer],200);
    }
}
