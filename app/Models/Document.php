<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "documents";

    protected $fillable = [
        'user_id',
        'business_id',
        'type',
        'name',
        'zone',
        'purpose',
        'biz_name',
        'biz_address',
        'biz_nature',
        'biz_owner',
        'owner_address',
        'proof',
        'status',
        'is_used',
        'token',
        'is_released',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
