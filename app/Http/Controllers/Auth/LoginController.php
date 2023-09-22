<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function adminValidate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }else if(Auth::guard('sub-admin')->attempt($credentials)){
            if(strtolower(Auth::guard('sub-admin')->user()->position) == 'bhw'){
                if(Auth::guard('sub-admin')->user()->is_active == 1){
                    $request->session()->regenerate();
                    return redirect()->route('bhw.residents');
                }else{
                    Auth::guard('sub-admin')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    
                    return back()->with('disabled' , 'Your account has been disabled.');
                }
            }else{
                if(Auth::guard('sub-admin')->user()->is_active == 1){
                    $request->session()->regenerate();
                    return redirect()->route('sub-admin.dashboard');
                }else{
                    Auth::guard('sub-admin')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    
                    return back()->with('disabled' , 'Your account has been disabled.');
                }
            }
        }

        return back()->with('error' , 'Username or Password is incorrect.');
    }

    public function residentValidate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('resident.home');
            // if(Auth::guard('web')->user()->is_approved == true){
            //     if(Auth::guard('web')->user()->is_active == true){
            //         $request->session()->regenerate();
            //         return redirect()->route('resident.home');
            //     }else{
            //         Auth::guard('web')->logout();
            //         $request->session()->invalidate();
            //         $request->session()->regenerateToken();
                        
            //         return back()->with('disabled' , 'Your account has been disabled.');
            //     }
            // }else{
            //     Auth::guard('web')->logout();
            //     $request->session()->invalidate();
            //     $request->session()->regenerateToken();
                    
            //     return back()->with('for-approval' , 'Your account has not been approved yet.');
            // }
        }else if(Auth::guard('business')->attempt($credentials)){
            return redirect()->route('business.home');
            // if(Auth::guard('business')->user()->is_approved == true){
            //     if(Auth::guard('business')->user()->is_active == true){
            //         $request->session()->regenerate();
            //         return redirect()->route('business.home');
            //     }else{
            //         Auth::guard('business')->logout();
            //         $request->session()->invalidate();
            //         $request->session()->regenerateToken();
                        
            //         return back()->with('disabled' , 'Your account has been disabled.');
            //     }
            // }else{
            //     Auth::guard('business')->logout();
            //     $request->session()->invalidate();
            //     $request->session()->regenerateToken();
                    
            //     return back()->with('for-approval' , 'Your account has not been approved yet.');
            // }
        }

        return back()->with('error' , 'Username or Password is incorrect.');
    }
}
