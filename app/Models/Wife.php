<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{
    use HasFactory;

    protected $table = 'wives';

    protected $fillable = [
        'family_head_id',
        'lname',
        'fname',
        'mname',
        'sname',
        'fullname',
        'bday',
        'bplace',
        'civil_status',
        'educ_attainment',
        'zone',
        'religion',
        'occupation',
        'contact',
        'philhealth',
        'first_dose',
        'second_dose',
        'vaccine_brand',
        'booster',
        'booster_brand',
    ];

    public function familyHead()
    {
        return $this->belongsTo(FamilyHead::class,);
    }
}
