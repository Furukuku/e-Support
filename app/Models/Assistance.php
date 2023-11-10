<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    use HasFactory;

    protected $table = 'assistances';

    protected $fillable = [
        'user_id',
        'need',
        'purpose',
        'date',
        'time',
        'reason',
        'status',
    ];

    public function resident()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
