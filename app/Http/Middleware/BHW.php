<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BHW
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $postion): Response
    {
        if(strtolower(auth()->user()->position) != $postion){
            Auth::guard('sub-admin')->logout();

            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
            
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
