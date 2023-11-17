<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Str;

class FamilyHead extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'family_heads';

    protected $fillable = [
        'user_id',
        'lname',
        'fname',
        'mname',
        'sname',
        'fullname',
        'bday',
        'bplace',
        'sex',
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
        'pipe_nawasa',
        'deep_well',
        'nipa',
        'concrete',
        'sem',
        'wood',
        'owned_toilet',
        'sharing_toilet',
        'poultry_livestock',
        'iodized_salt',
        'owned_electricity',
        'sharing_electricity',
        'house_no',
        'pwd',
        'solo_parent',
        'senior_citizen',
        'pregnant',
        'is_approved',
        'comment',
    ];

    public function wife()
    {
        return $this->hasOne(Wife::class);
    }

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAge()
    {
        return $this->bday->age;
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
            $activity->log_name = $this->wasRecentlyCreated ? 'New Family ' . $eventName : 'Family ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->lname  . ' family.';
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Family ' . $eventName : 'Family ' . $eventName;
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'BHW';
            $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->lname  . ' family.';
        }else if(auth()->guard('bhw')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Family ' . $eventName : 'Family ' . $eventName;
            $activity->causer_id = auth()->guard('bhw')->user()->id;
            $activity->causer_type = 'Sub-BHW';
            $activity->description = auth()->guard('bhw')->user()->username . ' ' . $eventName . ' ' . $this->lname  . ' family.';
        }else if(auth()->guard('web')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Family ' . $eventName : 'Family ' . $eventName;
            $activity->causer_id = auth()->guard('web')->user()->id;
            $activity->causer_type = 'Resident';
            $activity->description = auth()->guard('web')->user()->username . ' ' . $eventName . ' ' . $this->lname  . ' family.';
        }
    }
}
