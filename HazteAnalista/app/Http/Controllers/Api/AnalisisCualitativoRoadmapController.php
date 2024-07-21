<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AnalisisCualitativoRoadmap;

class AnalisisCualitativoRoadmapController extends Controller
{
    public function getCualitativoRoadmap(){
        $roadmap = AnalisisCualitativoRoadmap::select('id','item','value')->get();
        return response()->json(['roadmaps' => $roadmap],200);
    }
}
