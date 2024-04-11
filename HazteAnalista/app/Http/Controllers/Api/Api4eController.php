<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Api4eController extends Controller
{
   public function getCat4t(){
    $cat4t = DB::table('catalogo4e')->select('id as value','descripcion as label')
    ->get();
    return response()->json(['calatalogo4t' => $cat4t],200);
   } 
}
