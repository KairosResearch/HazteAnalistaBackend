<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiSectoresController extends Controller
{
    public function getCatSectores(){
        $sectores = DB::table('sectores')->select('id as value','descripcion as label')
        ->get();
        return response()->json(['sectores' => $sectores],200);
       } 
}
