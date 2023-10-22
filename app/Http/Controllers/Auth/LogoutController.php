<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('admin.login');
    }

    public function subAdminLogout(Request $request)
    {
        Auth::guard('sub-admin')->logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('admin.login');
    }

    public function BHWLogout(Request $request)
    {
        Auth::guard('sub-admin')->logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('admin.login');
    }

    public function subBHWLogout(Request $request)
    {
        Auth::guard('bhw')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect()->route('admin.login');
    }

    public function businessLogout(Request $request)
    {
        Auth::guard('business')->logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('welcome');
    }

    public function residentLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('resident.login');
    }
}
