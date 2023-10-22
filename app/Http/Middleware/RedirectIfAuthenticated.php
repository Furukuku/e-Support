<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if($guard === 'admin'){
                    return redirect()->route('admin.dashboard');
                }else if($guard === 'sub-admin'){
                    if(auth()->guard('sub-admin')->user()->position === 'BHW'){
                        return redirect()->route('bhw.dashboard');
                    }
                    return redirect()->route('sub-admin.dashboard');
                }else if($guard === 'bhw'){
                    return redirect()->route('sub-bhw.dashboard');
                }else if($guard === 'business'){
                    return redirect()->route('business.home');
                }else if($guard === 'web'){
                    return redirect()->route('resident.home');
                }
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
