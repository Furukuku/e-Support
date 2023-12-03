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
        'status',
        'decline_msg',
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

    
    public function brgyClearance()
    {
        return $this->hasOne(BarangayClearance::class);
    }

    public function bizClearance()
    {
        return $this->hasOne(BusinessClearance::class);
    }

    public function indigency()
    {
        return $this->hasOne(Indigency::class);
    }
}
