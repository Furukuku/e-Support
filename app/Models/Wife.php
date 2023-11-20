<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;

class Wife extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'wives';

    protected $fillable = [
        'family_head_id',
        'lname',
        'fname',
        'mname',
        'sname',
        'fullname',
        'bday',
        'bplace',
        'civil_status',
        'educ_attainment',
        'zone',
        'religion',
        'occupation',
        'contact',
        'philhealth',
        'first_dose',
        'second_dose',
        'vaccine_brand',
        'booster',
        'booster_brand',
    ];

    public function familyHead()
    {
        return $this->belongsTo(FamilyHead::class,);
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
            $activity->log_name = $this->wasRecentlyCreated ? 'New Wife ' . $eventName : 'Wife ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->fname . ' of ' . $this->familyHead->lname  . ' family.';
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Wife ' . $eventName : 'Wife ' . $eventName;
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'BHW';
            $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->fname . ' of ' . $this->familyHead->lname  . ' family.';
        }else if(auth()->guard('bhw')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Wife ' . $eventName : 'Wife ' . $eventName;
            $activity->causer_id = auth()->guard('bhw')->user()->id;
            $activity->causer_type = 'Sub-BHW';
            $activity->description = auth()->guard('bhw')->user()->username . ' ' . $eventName . ' ' . $this->fname . ' of ' . $this->familyHead->lname  . ' family.';
        }else if(auth()->guard('web')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Wife ' . $eventName : 'Wife ' . $eventName;
            $activity->causer_id = auth()->guard('web')->user()->id;
            $activity->causer_type = 'Resident';
            $activity->description = auth()->guard('web')->user()->username . ' ' . $eventName . ' ' . $this->fname . ' of ' . $this->familyHead->lname  . ' family.';
        }else{
            activity()->disableLogging();
        }
    }
}
