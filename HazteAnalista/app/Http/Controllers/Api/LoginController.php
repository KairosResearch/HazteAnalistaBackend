<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;


class LoginController extends Controller
{
    public function login(): JsonResponse
      {
       
        return response()->json([
               'data' => [
               'attributes'=> [
                   'id' => 12,
                   'name' => "test",
                   'email' => "test@test.com"
                ],
               'token' => "Un token"
             ],
            ], Response::HTTP_OK);
      }
}
