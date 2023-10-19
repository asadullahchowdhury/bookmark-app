<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $path = \Illuminate\Support\Facades\Request::route()->getName();
        if (Auth::check()) {
            if($path == 'lvs.auth') {
                return redirect()->route('lvs.home','/');
            } else {
                return $next($request);
            }
        } else {
            if($path == 'lvs.auth') {
                return $next($request);
            } else {
                return redirect()->route('lvs.auth', 'login');
            }
        }
    }
}
