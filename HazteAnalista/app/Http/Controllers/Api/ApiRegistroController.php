<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ApiRegistroController extends Controller
{
    //
    public function registro(Request $request){
        $id_user_privy = $request->id_user_privy;
        $wallet        = $request->wallet;
        
        $user = User::create([
            'id_user_privy' => $id_user_privy,
            'wallet' => $wallet,
        ]);
    return response()->json(['user' => $user], 200);   
    }
}
