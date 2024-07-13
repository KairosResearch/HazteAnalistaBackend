<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\proyectoSeguimiento;
use App\Models\Proyecto_seguimiento_sector;

class ApiProyectoSeguimientoController extends Controller
{
    public function saveProytecto(Request $request){
    
    $existProyect = proyectoSeguimiento::where('idUsuario',$request->idUsuario)
    ->where('idProyecto',$request->idProyecto)
    ->exists();
    
    if($existProyect){
        return response()->json(['Error' =>"Ya fue agregado este proyecto para el usuario"], 401);
    }else{
        $proyecto = proyectoSeguimiento::create([
        'idUsuario' => $request->idUsuario,
        'idProyecto' => $request->idProyecto,
        'id4e' => $request->id4e,
        'id_decision_proyecto' => $request->id_decision_proyecto,
        'marketCap' => $request->marketCap,
        'idExchange' => $request->idExchange,
        'precioEntrada' => $request->precioEntrada,
        'precioActual' => $request->precioActual
        ]);

        foreach($request->idSector as $key => $value){
            
         if(count($request->idSector) == 1 and $value == 1){
            $prcto_seg_sector = Proyecto_seguimiento_sector::create([
            'id_proyecto_seguimiento' => $proyecto->id,
            'id_sector' => $value]);
         }elseif(count($request->idSector) > 1 && in_array(1,$request->idSector)){
            if($value != 1){
            $prcto_seg_sector = Proyecto_seguimiento_sector::create([
            'id_proyecto_seguimiento' => $proyecto->id,
            'id_sector' => $value]);
            }
         }elseif(count($request->idSector) > 1){
            if($value != 1){
            $prcto_seg_sector = Proyecto_seguimiento_sector::create([
            'id_proyecto_seguimiento' => $proyecto->id,
            'id_sector' => $value]);
            }
         }
        }        
        return response()->json(['proyecto' => $proyecto], 200);
        }
    }

    public function getProyectos(Request $request){
        $proyectosSeg = DB::table('proyecto_seguimiento')
            ->join('proyectos', 'proyectos.id', '=', 'proyecto_seguimiento.idProyecto')
            ->select('proyecto_seguimiento.id as id_proyecto','id4e','id_decision_proyecto','idExchange','precioEntrada','proyecto','ticker')
            ->where('proyecto_seguimiento.idUsuario',$request->idUsuario)
            ->get();
        
        $arrray = array();
        foreach($proyectosSeg as $key => $value){
            $arrray[$key]['id_proyecto'] = $value->id_proyecto;
            $arrray[$key]['id4e'] = $value->id4e;
            $arrray[$key]['id_decision_proyecto'] = $value->id_decision_proyecto;
            $arrray[$key]['idExchange'] = $value->idExchange;
            $arrray[$key]['precioEntrada'] = $value->precioEntrada;
            $arrray[$key]['proyecto'] = $value->proyecto;
            $arrray[$key]['ticker'] = $value->ticker;
            $arrray[$key]['sectores'] = $this->GetSectores($value->id_proyecto);
        }
        return response()->json(['proyectos' => $arrray], 200);
    }

    public function GetSectores($id_proyecto){
        $arraySectores = array(); 
        
        $proyectosSegSec = Proyecto_seguimiento_sector::where('id_proyecto_seguimiento',$id_proyecto)
         ->select('id_sector')
         ->get();
        
        foreach($proyectosSegSec as $key=>$value){
            $arraySectores[$key] = $value->id_sector;
        }

        return $arraySectores;
    }
    

    public function deleteProject(Request $request){
        $id_projecto = $request->id_proyecto;
        $res = proyectoSeguimiento::where('id',$id_projecto)->delete();
       return response()->json(['eliminado'=>$res],200);
    }

    public function updateProyect(Request $request){
        $id_projecto = $request->id;
        $proyecto = proyectoSeguimiento::find($id_projecto);
        $proyecto->id4e = $request->input('id4e');
        $proyecto->id_decision_proyecto =  $request->input('id_decision_proyecto');
        $proyecto->idExchange = $request->input('idExchange');
        $proyecto->precioEntrada = $request->input('precioEntrada');
        $proyecto->update();
        
        $proyectosdelete = Proyecto_seguimiento_sector::where('id_proyecto_seguimiento',$id_projecto)
        ->delete();

        $sectoresAdd =  $request->idSectoradd;

        foreach($sectoresAdd as $key => $value){
            
            if(count($sectoresAdd) == 1 and $value == 1){
                $sector = Proyecto_seguimiento_sector::create([
                    'id_proyecto_seguimiento'=>$id_projecto,
                    'id_sector'=>$value]);
            }elseif(count($sectoresAdd) > 1 && in_array(1,$sectoresAdd)){
               if($value != 1){
                $sector = Proyecto_seguimiento_sector::create([
                    'id_proyecto_seguimiento'=>$id_projecto,
                    'id_sector'=>$value]);
               }
            }elseif(count($sectoresAdd) > 1){
               if($value != 1){
               $prcto_seg_sector = Proyecto_seguimiento_sector::create([
               'id_proyecto_seguimiento' => $proyecto->id,
               'id_sector' => $value]);
               }
            }
        }
        return response()->json(['Proyecto Acualizado'=>$proyecto],200);
    }

    public function deleteMasivo(Request $request){
        $proyectos = $request->arrayProyectos;
        $idUsuario = $request->idUsuario;

        foreach($proyectos as $key => $value){
            $proyectoDelete = proyectoSeguimiento::where('id',$value)
                ->where('idUsuario',$idUsuario)
                ->delete();
        }
        return response()->json(['Proyectos Eliminados'=>$proyectoDelete],200);
    }    
}
