<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiExchangesController extends Controller
{
    public function getCatExchanges(){
        $exchanges = DB::table('exchanges')->select('id as value','descripcion as label')
        ->get();
        return response()->json(['exchages' => $exchanges],200);
       } 
}
