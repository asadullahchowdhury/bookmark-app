<?php

namespace App\Http\Controllers;

use App\Services\Front\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function profile_details(Request $request)
    {
        $rv = UserService::profile_details($request);
        return response()->json($rv, 200);
    }

    public function profile_update(Request $request)
    {
        $rv = UserService::profile_update($request);
        return response()->json($rv, 200);
    }


    public function profile_update_password(Request $request)
    {
        $rv = UserService::profile_update_password($request);
        return response()->json($rv, 200);
    }


    public function login_history_list(Request $request)
    {
        $rv = UserService::login_history_list($request);
        return response()->json($rv, 200);
    }


}
