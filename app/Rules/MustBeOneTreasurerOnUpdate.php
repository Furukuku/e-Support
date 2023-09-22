<?php

namespace App\Rules;

use Closure;
use App\Models\BrgyOfficial;
use Illuminate\Contracts\Validation\ValidationRule;

class MustBeOneTreasurerOnUpdate implements ValidationRule
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $official = BrgyOfficial::where('position', 'Treasurer')
            ->where('id', '!=', $this->id)
            ->first();
        
        if($official && $official->position === $value){
            $fail("There's already a treasurer.");
        }
    }
}
