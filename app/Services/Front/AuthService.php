<?php

namespace App\Services\Front;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public static function login($request)
    {

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required|min:6'
                ]
            );

            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }

            $credential = ['email' => $request->email, 'password' => $request->password];
            if (Auth::guard('admin')->attempt($credential, $request->remember)) {
                $user = Auth::guard('admin')->user();
                return ['status' => 200, 'data' =>  $user, 'msg' => 'Login successful'];
            } else {
                return ['status' => 500, 'errors' => ['error' => 'Invalid Credentials! Please try again']];
            }
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }


    public static function register($request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'first_name' => 'required|min:3',
                    'last_name' => 'required|min:3',
                    'email' => 'required|unique:admins,email',
                    'password' => 'required|min:6|confirmed'
                ]
            );
            if ($validator->fails()) {
                return ['status' => 500, 'errors' => $validator->errors()];
            }
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->mobile = $request->mobile ?? null;
            $user->avatar =  null;
            $user->save();

            /*            Mail::send('emails.verify', ['user' => $user], function ($message) use ($user) {
                            $message->to($user->email, $user->first_name)->subject(env('APP_NAME') . 'Activate your account :');
                            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                        });*/

            return ['status' => 200, 'msg' => 'Registration has been completed successfully.'];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }


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


    public static function profile_logout($request)
    {
        try {
            Auth::guard('users')->logout();
            return ['status' => 200];
        } catch (\Exception $e) {
            return ['status' => 500, 'errors' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
