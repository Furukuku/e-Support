<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Str;

class Report extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'reports';

    protected $fillable = [
        'user_id',
        'report_name',
        'zone',
        'latitude',
        'longitude',
        'description',
        'is_exist',
        'status',
        'time_interval',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ReportImage::class);
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
            $activity->log_name = 'Incident Report ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            if(Str::endsWith($this->user->fname, 's')){
                $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->user->fname  . "' report.";
            }else{
                $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->user->fname  . "'s report.";
            }
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = 'Incident Report ' . $eventName;
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'Sub-Admin';
            if(Str::endsWith($this->user->fname, 's')){
                $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->user->fname  . "' report.";
            }else{
                $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->user->fname  . "'s report.";
            }
        }
    }
}
