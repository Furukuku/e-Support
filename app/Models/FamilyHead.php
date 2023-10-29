<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyHead extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'family_heads';

    protected $fillable = [
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
        'water_source',
        'house',
        'toilet',
        'garden',
        'electricity',
        'house_no',
        'pwd',
        'solo_parent',
        'senior_citizen',
        'pregnant',
        'is_approved',
    ];

    public function wife()
    {
        return $this->hasOne(Wife::class);
    }

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAge()
    {
        return $this->bday->age;
    }
}
