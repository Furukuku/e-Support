<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $table = 'family_members';

    protected $fillable = [
        'family_head_id',
        'lname',
        'fname',
        'mname',
        'sname',
        'fullname',
        'bday',
        'bplace',
        'educ_attainment',
        'first_dose',
        'second_dose',
        'vaccine_brand',
        'booster',
        'booster_brand',
    ];

    public function familyHead()
    {
        return $this->belongsTo(FamilyHead::class);
    }
}
