<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MustAtleastOneIsTrueOfTheFour implements ValidationRule
{
    private $value1, $value2, $value3;

    public function __construct($other1, $other2, $other3)
    {
        $this->value1 = $other1;
        $this->value2 = $other2;
        $this->value3 = $other3;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($value != true && $this->value1 != true && $this->value2 != true && $this->value3 != true){
            $fail("At least one of the fields must be checked.");
        }
    }
}
