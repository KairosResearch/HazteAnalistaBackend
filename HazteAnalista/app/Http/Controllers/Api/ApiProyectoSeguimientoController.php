<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\proyectoSeguimiento;

class ApiProyectoSeguimientoController extends Controller
{
    public function saveProytecto(Request $request){
    $proyecto = proyectoSeguimiento::create([
        'idUsuario' => $request->idUsuario,
        'nombre' => $request->nombre,
        'ticket' => $request->ticket,
        'id4e' => $request->id4e,
        'id_decision_proyecto' => $request->id_decision_proyecto,
        'marketCap' => $request->marketCap,
        'siAth' => $request->siAth,
        'idExchange' => $request->idExchange,
        'idSector' => $request->idSector,
        'precioEntrada' => $request->precioEntrada,
        'precioActual' => $request->precioActual,
        ]);
    return response()->json(['proyecto' => $proyecto], 200);
    }
}
