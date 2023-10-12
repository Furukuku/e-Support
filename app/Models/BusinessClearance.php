<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessClearance extends Model
{
    use HasFactory;

    protected $table = 'business_clearances';

    protected $fillable = [
        'document_id',
        'clearance_no',
        'biz_name',
        'biz_address',
        'biz_nature',
        'biz_owner',
        'owner_address',
        'proof',
        'date_issued',
        'expiry_date',
        'ctc',
        'issued_at',
        'issued_on',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
