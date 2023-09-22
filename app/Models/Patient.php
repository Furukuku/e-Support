<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'patients';

    protected $fillable = [
        'lname',
        'fname',
        'mname',
        'sname',
        'gender',
        'p_civil_status',
        'age',
        'p_bday',
        'mother_maiden_name',
        'mobile',
        'blood_type',
        'religion',
        'p_education',
        'p_occupation',
        'municipality',
        'barangay',
        'zone',
        'street',
        'philhealth_no',
        'member_name',
        'membership_type',
        'category_type',
        'expiry',
        'ph_bday',
        'ph_civil_status',
        'ph_education',
        'ph_occupation',
        'weight',
        'temp',
        'bp',
        'height',
        'pulse_rate',
        'respiratory_rate',
    ];

    public function healthRecords()
    {
        return $this->hasMany(HealthRecord::class);
    }
}
