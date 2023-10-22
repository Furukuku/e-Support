<?php

namespace App\Rules;

use App\Models\SubAdmin;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MustOnlyOneBHWHead implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $official = SubAdmin::where('position', 'BHW')->first();
        if($official && $official->position === $value){
            $fail("There's already a BHW head.");
        }
    }
}
