<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckVerifyCodeIfExpired implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(auth()->guard('web')->check()){
            if (auth()->guard('web')->user()->mobile_verify_code_exp <= now()) {
                $fail('The verification code has expired. Please resend new verification code.');
            }
        }else if(auth()->guard('business')->check()){
            if (auth()->guard('business')->user()->mobile_verify_code_exp <= now()) {
                $fail('The verification code has expired. Please resend new verification code.');
            }
        }else{
            $fail('Something went wrong. Please try again.');

        }
    }
}
