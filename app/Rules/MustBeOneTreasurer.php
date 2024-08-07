<?php

namespace App\Rules;

use Closure;
use App\Models\BrgyOfficial;
use Illuminate\Contracts\Validation\ValidationRule;

class MustBeOneTreasurer implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $official = BrgyOfficial::where('position', 'Treasurer')->first();
        if($official && $official->position === $value){
            $fail("There's already a treasurer.");
        }
    }
}
