<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Services\Front\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request  $request){
        $rv = AuthService::login($request);
        return response()->json($rv, 200);
    }

    public function register(Request  $request){
        $rv = AuthService::register($request);
        return response()->json($rv, 200);
    }
}
