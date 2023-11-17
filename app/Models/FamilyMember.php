<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;

class FamilyMember extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'family_members';

    protected $fillable = [
        'family_head_id',
        'lname',
        'fname',
        'mname',
        'sname',
        'fullname',
        'bday',
        'bplace',
        'sex',
        'educ_attainment',
        'first_dose',
        'second_dose',
        'vaccine_brand',
        'booster',
        'booster_brand',
    ];

    public function familyHead()
    {
        return $this->belongsTo(FamilyHead::class);
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
            $activity->log_name = $this->wasRecentlyCreated ? 'New Family Member ' . $eventName : 'Family Member ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->fname . ' of ' . $this->familyHead->lname  . ' family.';
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Family Member ' . $eventName : 'Family Member ' . $eventName;
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'BHW';
            $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->fname . ' of ' . $this->familyHead->lname  . ' family.';
        }else if(auth()->guard('bhw')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Family Member ' . $eventName : 'Family Member ' . $eventName;
            $activity->causer_id = auth()->guard('bhw')->user()->id;
            $activity->causer_type = 'Sub-BHW';
            $activity->description = auth()->guard('bhw')->user()->username . ' ' . $eventName . ' ' . $this->fname . ' of ' . $this->familyHead->lname  . ' family.';
        }else if(auth()->guard('web')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Family Member ' . $eventName : 'Family Member ' . $eventName;
            $activity->causer_id = auth()->guard('web')->user()->id;
            $activity->causer_type = 'Resident';
            $activity->description = auth()->guard('web')->user()->username . ' ' . $eventName . ' ' . $this->fname . ' of ' . $this->familyHead->lname  . ' family.';
        }
    }
}
