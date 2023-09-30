<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jobs';

    protected $fillable = [
        'business_id',
        'title',
        'job_type',
        'workplace_type',
        'phone_number',
        'email',
        'location',
        'business_img',
        'description',
        'requirements',
        'done_hiring',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
