<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateInterval implements ValidationRule
{
    private $from;

    public function __construct($from)
    {
        $this->from = $from;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($value <= $this->from){
            $fail('Must be a valid date interval');
        }
    }
}
