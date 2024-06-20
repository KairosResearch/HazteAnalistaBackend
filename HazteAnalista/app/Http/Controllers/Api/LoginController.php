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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
      $request->validate([
        'id_user_privy' => 'required|string',
        'wallet' => 'required|string'
      ]);

    
    $user = DB::table('users')
                ->select('id','id_user_privy','wallet')
                ->where('id_user_privy',$request->id_user_privy)
                ->get();
    
    if(count($user) > 0 ){
        $proyectosSeg = proyectoSeguimiento::select('id4e','id_decision_proyecto','marketCap','idExchange','idSector','precioEntrada')
        ->where('idUsuario',$user[0]->id)->get();

        return response()->json([
            'id_usuario' => $user[0]->id,
            'id_user_privy' => $user[0]->id_user_privy,
            'waller' => $user[0]->wallet,
            'proyectos_seguimiento' => $proyectosSeg
        ]);

    }else{
        return response()->json(['El usuario no exite'], 401);
    }

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
