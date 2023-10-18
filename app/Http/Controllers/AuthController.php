<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Services\Front\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rv = AuthService::login($request);
        return response()->json($rv, 200);
    }

    public function register(Request $request)
    {
        $rv = AuthService::register($request);
        return response()->json($rv, 200);
    }

    public function forgot(Request $request)
    {
        $rv = AuthService::forgot($request);
        return response()->json($rv, 200);
    }

    public function reset(Request $request)
    {
        $rv = AuthService::reset($request);
        return response()->json($rv, 200);
    }


    public function logout(Request $request)
    {
        $rv = AuthService::logout($request);
        return response()->json($rv, 200);
    }


    public function profile_details(Request $request)
    {
        $rv = AuthService::profile_details($request);
        return response()->json($rv, 200);
    }
}
