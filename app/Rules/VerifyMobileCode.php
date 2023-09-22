<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyMobileCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(auth()->guard('web')->check()){
            if ($value !== auth()->guard('web')->user()->mobile_verify_code) {
                $fail('The :attribute you have entered is incorrect.');
            }
        }else if(auth()->guard('business')->check()){
            if ($value !== auth()->guard('business')->user()->mobile_verify_code) {
                $fail('The :attribute you have entered is incorrect.');
            }
        }else{
            $fail('Something went wrong. Please try again.');

        }
    }
}
