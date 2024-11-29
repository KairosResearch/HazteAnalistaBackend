<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UsersWallets;

class UsersWalletsController extends Controller
{
    Public function getWallets($idUsuario){
        $wallest = UsersWallets::where('id_usuarios',$idUsuario)->get();
        return response()->json($wallest, 200);
    }

    public function deleteWallet(Request $request){
        $idUsuario  = $request->idUsuario;
        $wallet     = $request->wallet;

        $walletDelete = UsersWallets::where('id_usuarios',$idUsuario)
        ->where('wallet',$wallet)
        ->delete();
        return response()->json(['Wallet Eliminada'=>$walletDelete],200);
    }

    public function saveWallet(Request $request){
        $existWallet = UsersWallets::where('id_usuarios',$request->idUsuario)
        ->where('wallet',$request->wallet)
        ->exists();
        
        if($existWallet){
            return response()->json(['Error' =>"Ya fue registrada esta wallet"], 401);
        }else{
            $newWallet = UsersWallets::create([
                'id_usuarios' => $request->idUsuario,
                'wallet' => $request->wallet
            ]);

            return response()->json(['newWallet' => $newWallet], 200);
        }

    }
}
