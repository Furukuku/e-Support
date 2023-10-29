<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MustAtleastOneIsTrueOfTheTwo implements ValidationRule
{
    private $other_value;

    public function __construct($other)
    {
        $this->other_value = $other;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($value != true && $this->other_value != true){
            $fail("At least one of the fields must be checked.");
        }
    }
}
