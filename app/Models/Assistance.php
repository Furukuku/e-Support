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
        'purpose',
        'description',
        'date',
        'time',
        'comment',
        'status',
    ];

    public function resident()
    {
        return $this->belongsTo(User::class);
    }
}
