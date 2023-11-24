<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfCompanyApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user() && $request->user()->is_approved == false){
            $msg = !is_null($request->user()->decline_msg) ? 'Your account has been declined due to this reason: ' . $request->user()->decline_msg : 'Your account has not been approved yet. Please wait for the barangay to approve your account.';

            Auth::guard('business')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('resident.login')->with('for-approval', $msg);
        }

        if($request->user() && $request->user()->is_approved == true){
            $request->session()->regenerate();
        }

        return $next($request);
    }
}
