<?php

namespace App\Services\Front;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserService
{

    public static function profile_details($request)
    {
        try {
            $user_id = Auth::id();
            $user = User::with('media')->where('id', $user_id)->first();
            return ['status' => 200, 'data' => $user];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }



    public static function profile_update($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|unique:users,email,' . $request->email . ',email',
                    'first_name' => 'required|min:3',
                    'last_name' => 'required|min:3',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }

            $user = User::where('id', Auth::id())->first();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->avatar = $request->avatar ?? null;
            $user->phone = $request->phone ?? null;
            $user->save();

            return ['status' => 200, 'msg' => 'Your profile has been updated successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }

    public static function profile_update_password($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'current_password' => 'required|min:6',
                    'password' => 'required|min:6|confirmed',
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }

            $user = User::where('id', Auth::guard('admins')->id())->first();
            if(Hash::check($request->current_password, $user->password)){
                $user->password = bcrypt($request->password);
                $user->save();
            } else {
                return ['status' => 500, 'errors' => ['current_password' => ['Current is not correct! Please type correct password.']]];
            }

            return ['status' => 200];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }



}
