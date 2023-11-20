<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayInfo extends Model
{
    use HasFactory;

    protected $table = 'barangay_infos';

    protected $fillable = [
        'email',
        'tel_no',
        'phone_no',
        'history',
        'mission',
        'vision',
        'family_profiling'
    ];
}
