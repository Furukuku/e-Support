<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayClearance extends Model
{
    use HasFactory;

    protected $table = 'barangay_clearances';

    protected $fillable = [
        'document_id',
        'name',
        'zone',
        'purpose',
        'date_issued',
        'ctc',
        'issued_at',
        'issued_on',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
