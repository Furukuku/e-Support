<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfResidentAccountIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user() && $request->user()->is_active == false){
            $msg = !is_null($request->user()->disable_msg) ? $request->user()->disable_msg : 'Your account has been disabled.';

            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('resident.login')->with('disabled', $msg);
        }

        if($request->user() && $request->user()->is_active == true){
            $request->session()->regenerate();
        }

        return $next($request);
    }
}
