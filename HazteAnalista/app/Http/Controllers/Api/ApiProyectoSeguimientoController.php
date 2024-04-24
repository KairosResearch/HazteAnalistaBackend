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

    public function getProyectos(Request $request){
        $proyectosSeg = proyectoSeguimiento::select('nombre','ticket','id4e','id_decision_proyecto','marketCap','siAth','idExchange','idSector','precioEntrada','precioActual')
        ->where('idUsuario',$request->idUsuario)->get();

        return response()->json(['proyectos' => $proyectosSeg], 200);
    }

    public function deleteProject(Request $request){
        $id_projecto = $request->id_proyecto;
        $res = proyectoSeguimiento::where('id',$id_projecto)->delete();
       return response()->json(['eliminado'=>$res],200);
    }

    public function updateProyect(Request $request){
        $id_projecto = $request->id_proyecto;
        $proyecto = proyectoSeguimiento::find($id_projecto);
        $proyecto->nombre = $request->input('nombre');
        $proyecto->ticket = $request->input('ticket');
        $proyecto->id4e = $request->input('id4e');
        $proyecto->id_decision_proyecto =  $request->input('id_decision_proyecto');
        $proyecto->marketCap = $request->input('marketCap');
        $proyecto->siAth = $request->input('siAth');
        $proyecto->idExchange = $request->input('idExchange');
        $proyecto->idSector = $request->input('idSector');
        $proyecto->precioEntrada = $request->input('precioEntrada');
        $proyecto->precioActual = $request->input('precioActual');
        $proyecto->update();

        return response()->json(['Proyecto Acualizado'=>$proyecto],200);
    }

    
}
