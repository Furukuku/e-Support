<?php

namespace App\Rules;

use App\Models\BrgyOfficial;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MustBeOneBrgyCaptain implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $official = BrgyOfficial::where('position', 'Captain')->first();
        if($official && $official->position === $value){
            $fail("There's already a barangay captain.");
        }
    }
}
