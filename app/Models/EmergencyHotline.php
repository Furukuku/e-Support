<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyHotline extends Model
{
    use HasFactory;

    protected $table = 'emergency_hotlines';

    protected $fillable = [
        'ems',
        'pnp',
        'bfp'
    ];
}
