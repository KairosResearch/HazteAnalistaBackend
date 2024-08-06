<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\User;
use App\Models\proyectoSeguimiento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Proyecto_seguimiento_sector;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Api\SaveAnalisisCuantitativoController;


class LoginController extends Controller
{
    /**
     * Registro de usuario
     */
    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        return response()->json([
            'message' => 'Usuario creado correctamente!'
        ], 201);
    }

    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {
      $balances = new SaveAnalisisCuantitativoController();
      $request->validate([
        'id_user_privy' => 'required|string',
        'wallet' => 'required|string'
      ]);

    
    $user = DB::table('users')
                ->select('id','id_user_privy','wallet')
                ->where('id_user_privy',$request->id_user_privy)
                ->get();
    
    if(count($user) > 0 ){
        /*$proyectosSeg = proyectoSeguimiento::select('id4e','id_decision_proyecto','marketCap','idExchange','precioEntrada')
        ->where('idUsuario',$user[0]->id)->get();*/

        $proyectosSeg = DB::table('proyecto_seguimiento')
        ->join('proyectos', 'proyectos.id', '=', 'proyecto_seguimiento.idProyecto')
        ->select('proyecto_seguimiento.id as id_proyecto','id4e','id_decision_proyecto','marketCap','idExchange','precioEntrada','proyecto','ticker')
        ->where('proyecto_seguimiento.idUsuario',$user[0]->id)
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
            $arrray[$key]['marketCap'] = $value->marketCap;
        }

        return response()->json([
            'id_usuario' => $user[0]->id,
            'id_user_privy' => $user[0]->id_user_privy,
            'waller' => $user[0]->wallet,
            'proyectos_seguimiento' => $arrray
            //'Balances' => $balances->getTokenBalancesArb($user[0]->wallet)->original
        ]);

    }else{
        return response()->json(['El usuario no exite'], 401);
    }

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
    
    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request)
    {   
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        $user = DB::table('users')
        ->select('id','id_user_privy','wallet')
        ->where('id',$request->id)
        ->get();

        if(count($user) > 0 ){
            return response()->json($user,200);
        }else{
            return response()->json(['El usuario no existe'],401);
        }
        
    }
}
