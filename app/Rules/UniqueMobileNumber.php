<?php

namespace App\Rules;

use App\Models\Business;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueMobileNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $mobiles = Business::where('mobile', $value)->get();
        $newValue = 63 . $value;
        foreach($mobiles as $mobile){
            if ($mobile === $newValue) {
                $fail('The :attribute has already taken.');
            }
        }
    }
}
