<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportImage extends Model
{
    use HasFactory;

    protected $table = 'report_images';

    protected $fillable = [
        'report_id',
        'image',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
