<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Str;

class Assistance extends Model
{
    use HasFactory, LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()
        ->logOnlyDirty();
    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        if(auth()->guard('admin')->check()){
            $activity->log_name = 'Assistance ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            if(Str::endsWith($this->resident->fname, 's')){
                $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->resident->fname  . "' requested assistance.";
            }else{
                $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->resident->fname  . "'s requested assistance.";
            }
        }
    }
}
