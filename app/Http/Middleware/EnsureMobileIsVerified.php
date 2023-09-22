<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Interfaces\MustVerifyMobile;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class EnsureMobileIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null): Response
    {
        if (! $request->user() ||
        ($request->user() instanceof MustVerifyMobile &&
        ! $request->user()->hasVerifiedMobile())) {
        return $request->expectsJson()
                ? abort(403, 'Your mobile number is not verified.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'verification-mobile.notice'));
        }

        return $next($request);
    }
}
