<?php

namespace App\Rules;

use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Wife;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckIfValidResident implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $head = FamilyHead::where('fullname', $value)->first();
        $wife = Wife::where('fullname', $value)->first();
        $member = FamilyMember::where('fullname', $value)->first();
        if(is_null($head) && is_null($wife) && is_null($member)){
            $fail("Resident not found.");
        }
    }
}
