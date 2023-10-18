<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckTypeOfDocument
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Route::is('admin.templates.brgy-clearance') && $request->document->type === 'Barangay Clearance'){
            return $next($request);
        }else if(Route::is('admin.templates.indigency') && $request->document->type === 'Indigency'){
            return $next($request);
        }else if(Route::is('admin.templates.biz-clearance') && $request->document->type === 'Business Clearance'){
            return $next($request);
        }

        abort(404);
    }
}
