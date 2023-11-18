<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BarangayHealthWorker;
use App\Models\Business;
use App\Models\SubAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    public function sendLink(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $biz = Business::where('email', $request->email)->first();
        $subBhw = BarangayHealthWorker::where('email', $request->email)->first();
        $subAdmin = SubAdmin::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        $status = null;
        if(!is_null($user)){
            $request->validate([
                'email' => ['required', 'email', 'exists:businesses'],
            ]);

            $status = Password::sendResetLink(
                $request->only('email')
            );
        }else if(!is_null($biz)){
            $request->validate([
                'email' => ['required', 'email', 'exists:businesses'],
            ]);

            $status = Password::broker('businesses')->sendResetLink(
                $request->only('email')
            );
        }else if(!is_null($subBhw)){
            $request->validate([
                'email' => ['required', 'email', 'exists:barangay_health_workers'],
            ]);

            $status = Password::broker('bhws')->sendResetLink(
                $request->only('email')
            );
        }else if(!is_null($subAdmin)){
            $request->validate([
                'email' => ['required', 'email', 'exists:sub_admins'],
            ]);

            $status = Password::broker('sub-admins')->sendResetLink(
                $request->only('email')
            );
        }else if(!is_null($admin)){
            $request->validate([
                'email' => ['required', 'email', 'exists:admins'],
            ]);

            $status = Password::broker('admins')->sendResetLink(
                $request->only('email')
            );
        }else{
            return back()->withErrors(['email' => 'Email does not exists']);
        }


        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resetPasswordForm(string $token)
    {
        return view('auth.users.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $biz = Business::where('email', $request->email)->first();
        $subBhw = BarangayHealthWorker::where('email', $request->email)->first();
        $subAdmin = SubAdmin::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        if(!is_null($user)){
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
    
                    $user->save();
    
                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                    ? redirect()->route('resident.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);

        }else if(!is_null($biz)){
            $status = Password::broker('businesses')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (Business $business, string $password) {
                    $business->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
    
                    $business->save();
    
                    event(new PasswordReset($business));
                }
            );

            return $status === Password::PASSWORD_RESET
                    ? redirect()->route('resident.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);

        }else if(!is_null($subBhw)){
            $status = Password::broker('bhws')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (BarangayHealthWorker $bhw, string $password) {
                    $bhw->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
    
                    $bhw->save();
    
                    event(new PasswordReset($bhw));
                }
            );

            return $status === Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);

        }else if(!is_null($subAdmin)){
            $status = Password::broker('sub-admins')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (SubAdmin $sub_admin, string $password) {
                    $sub_admin->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
    
                    $sub_admin->save();
    
                    event(new PasswordReset($sub_admin));
                }
            );

            return $status === Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);

        }else if(!is_null($admin)){
            $status = Password::broker('admins')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (Admin $_admin, string $password) {
                    $_admin->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
    
                    $_admin->save();
    
                    event(new PasswordReset($_admin));
                }
            );

            return $status === Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);

        }else{
            return back()->withErrors(['email' => 'Email does not exists']);
        }
    }
}
