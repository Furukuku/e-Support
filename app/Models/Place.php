<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory, LogsActivity;

    use SoftDeletes;

    protected $table = 'places';

    protected $fillable = [
        'business_id',
        'display_img',
        'name',
        'type',
        'description',
        'location',
        'latitude',
        'longitude',
        'is_approved',
        'decline_msg'
    ];


    public function business()
    {
        return $this->belongsTo(Business::class);
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
            $activity->log_name = $this->wasRecentlyCreated ? 'New place ' . $eventName : 'Place ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->name . '.';
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New place ' . $eventName : 'Place ' . $eventName;
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'Sub-Admin';
            $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->name . '.';
        }
    }
}
