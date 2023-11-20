<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory, LogsActivity;

    use SoftDeletes;

    protected $table = 'programs';

    protected $fillable = [
        'display_img',
        'title',
        'description',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()
        ->logOnlyDirty();
    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        if(auth()->guard('admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New program ' . $eventName : 'Program ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->title . ' program.';
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New program ' . $eventName : 'Program ' . $eventName;
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = auth()->guard('sub-admin')->user()->position === 'BHW' ? 'BHW' : 'Sub-Admin';
            $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->title . ' program.';
        }else{
            activity()->disableLogging();
        }
    }
}
