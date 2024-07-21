<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCuantitativoTokenomics;

class AnalisisCuantitativoTokenomicsController extends Controller
{
    public function getCuantitativoTokens(){
        $tokens = AnalisisCuantitativoTokenomics::select('id','item','value')->get();
        return response()->json(['tokens' => $tokens],200);
    }
}
