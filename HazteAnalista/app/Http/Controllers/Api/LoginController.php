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
        'email' => 'required|string|email',
        'password' => 'required|string',
        'remember_me' => 'boolean'
    ]);

    $credentials = request(['email', 'password']);

    if (!Auth::attempt($credentials))
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);

    $user = $request->user();
    
    $proyectosSeg = proyectoSeguimiento::select('nombre','ticket','id4e','id_decision_proyecto','marketCap','siAth','idExchange','idSector','precioEntrada','precioActual')
    ->where('idUsuario',$user->id)->get();

    
    $tokenResult = $user->createToken('Personal Access Token');

    $token = $tokenResult->token;
    if ($request->remember_me)
        $token->expires_at = Carbon::now()->addWeeks(1);
    $token->save();

    return response()->json([
        'id_usuario' => $user->id,
        'name_usuario' => $user->name,
        'email_usuario' => $user->email,
        'proyectos_seguimiento' => $proyectosSeg,
        'access_token' => $tokenResult->accessToken,
        'token_type' => 'Bearer',
        'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
    ]);

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
        return response()->json($request->user());
    }
}
