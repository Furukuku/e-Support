<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $table = 'health_records';

    protected $fillable = [
        'patient_id',
        'nc_diseases',
        'dental',
        'diabetes',
        'hypertension',
        'cc',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
