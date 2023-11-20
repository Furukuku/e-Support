<?php

namespace App\Http\Middleware;

use App\Models\BarangayInfo;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckResidentIfCanProfiling
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $brgyInfo = BarangayInfo::first();
        if($request->user() && !is_null($brgyInfo) && $brgyInfo->family_profiling == false){
            return redirect()->back();
        }

        return $next($request);
    }
}
