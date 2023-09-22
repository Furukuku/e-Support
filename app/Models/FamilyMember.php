<?php

namespace App\Models;

use App\Models\Family;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FamilyMember extends Model
{
    use HasFactory, LogsActivity;

    // use SoftDeletes;

    protected $table = 'family_members';

    protected $fillable = [
        'family_id',
        'lname',
        'fname',
        'mname',
        'sname',
        'bday',
        'bplace',
        'educ_attainment',
        'first_dose',
        'second_dose',
        'vaccine_brand',
        'booster',
        'booster_brand',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
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
            // dd($this->id . ', ' . $activity->subject_id);
            $family = Family::find($this->family_id);
            $family_name = $family->head_lname;
            $activity->log_name =  $this->wasRecentlyCreated ? 'New family member ' . $eventName : 'Family member ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' a family member from ' . $family_name . ' family.';
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = 'Family Member';
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'Sub-Admin';
            $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' a family member.';
        }else{
            $activity->log_name = 'Family Member';
            $activity->causer_id = auth()->guard('web')->user()->id;
            $activity->causer_type = 'Resident';
            $activity->description = auth()->guard('web')->user()->username . ' ' . $eventName . ' a family member.';
        }
    }
}
