<?php

namespace App\Http\Livewire\Auth\Otp;

use Livewire\Component;
use App\Models\Business;
use App\Rules\CheckVerifyCodeIfExpired;
use App\Rules\VerifyMobileCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\RateLimiter;

class Company extends Component
{
    public $verification_code;

    public $too_many_resend, $success_message, $code_exp;

    public function resetInputs()
    {
        $this->verification_code = '';
        $this->too_many_resend = '';
        $this->success_message = '';
        $this->code_exp = '';
        RateLimiter::clear('resend-code:' . auth()->guard('business')->user()->username);
    }

    public function resendCode()
    {
        $sendCodeAttempt = RateLimiter::attempt(
            'resend-code:' . auth()->guard('business')->user()->username,
            1,
            function() {
                $authUser = auth()->guard('business')->user();

                do{
                    $code = random_int(111111, 999999);
                }while($authUser->mobile_verify_code === $code);
        
                $user = Business::find($authUser->id);
                $user->mobile_verify_code = $code;
                $user->mobile_verify_code_exp = now()->addMinutes(3);
                $user->save();
                
                event(new Registered($user));
            },
            180,
        );

        if (! $sendCodeAttempt) {
            $this->success_message = '';
            $this->too_many_resend = 'Too many request.';
        }else{
            $this->too_many_resend = '';
            $this->success_message = 'Sent successfully.';
        }
    }

    public function verify()
    {
        $this->validate([
            'verification_code' => ['required', 'numeric', new VerifyMobileCode, new CheckVerifyCodeIfExpired]
        ]);

        $user = Auth::guard('business')->user();

        if($this->verification_code === $user->mobile_verify_code){
            $user->markMobileAsVerified();

            $this->resetInputs();
            $this->resetErrorBag();
            $this->resetValidation();
            return redirect()->route('business.home');
        }
    }

    public function render()
    {
        return view('livewire.auth.otp.company');
    }
}
