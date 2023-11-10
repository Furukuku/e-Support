<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentPrice extends Model
{
    use HasFactory;

    protected $table = 'document_prices';

    protected $fillable = [
        'brgy_clearance',
        'biz_clearance',
    ];
}
