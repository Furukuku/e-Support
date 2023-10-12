<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indigency extends Model
{
    use HasFactory;

    protected $table = 'indigencies';

    protected $fillable = [
        'document_id',
        'name',
        'purpose',
        'date_issued',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
