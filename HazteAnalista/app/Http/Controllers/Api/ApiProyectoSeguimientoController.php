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
        'idProyecto' => $request->idProyecto,
        'id4e' => $request->id4e,
        'id_decision_proyecto' => $request->id_decision_proyecto,
        'marketCap' => $request->marketCap,
        'siAth' => $request->siAth,
        'idExchange' => $request->idExchange,
        'idSector' => $request->idSector,
        'precioEntrada' => $request->precioEntrada,
        ]);
    return response()->json(['proyecto' => $proyecto], 200);
    }

    public function getProyectos(Request $request){
        $proyectosSeg = proyectoSeguimiento::select('id as id_proyecto','nombre','ticket','id4e','id_decision_proyecto','marketCap','siAth','idExchange','idSector','precioEntrada','precioActual')
        ->where('idUsuario',$request->idUsuario)->get();

        return response()->json(['proyectos' => $proyectosSeg], 200);
    }

    public function deleteProject(Request $request){
        $id_projecto = $request->id_proyecto;
        $id_usuario = $request->id_usuario;
        $res = proyectoSeguimiento::where('idUsuario',$id_usuario)->where('idProyecto',$id_projecto)->delete();
       return response()->json(['eliminado'=>$res],200);
    }

    public function updateProyect(Request $request){
        $id_projecto = $request->id;
        $proyecto = proyectoSeguimiento::find($id_projecto);
        $proyecto->id4e = $request->input('id4e');
        $proyecto->id_decision_proyecto =  $request->input('id_decision_proyecto');
        $proyecto->siAth = $request->input('siAth');
        $proyecto->idExchange = $request->input('idExchange');
        $proyecto->idSector = $request->input('idSector');
        $proyecto->precioEntrada = $request->input('precioEntrada');
        $proyecto->update();

        return response()->json(['Proyecto Acualizado'=>$proyecto],200);
    }

    
}
