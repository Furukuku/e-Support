<?php

namespace App\Models;

use App\Models\FamilyMember;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends Model
{
    use HasFactory, LogsActivity;

    use SoftDeletes;

    protected $table = 'families';

    protected $fillable = [
        // Family Head
        'head_lname',
        'head_fname',
        'head_mname',
        'head_sname',
        'head_bday',
        'head_bplace',
        'head_civil_status',
        'head_educ_attainment',
        'head_zone',
        'head_religion',
        'head_occupation',
        'head_contact',
        'head_philhealth',
        'head_first_dose',
        'head_second_dose',
        'head_vaccine_brand',
        'head_booster',
        'head_booster_brand',

        // Wife
        'wife_lname',
        'wife_fname',
        'wife_mname',
        'wife_sname',
        'wife_bday',
        'wife_bplace',
        'wife_civil_status',
        'wife_educ_attainment',
        'wife_zone',
        'wife_religion',
        'wife_occupation',
        'wife_contact',
        'wife_philhealth',
        'wife_first_dose',
        'wife_second_dose',
        'wife_vaccine_brand',
        'wife_booster',
        'wife_booster_brand',

        // Additional Info
        'total_family_member',
        'water_source',
        'house',
        'toilet',
        'garden',
        'electricity',

        // Beneficiaries
        'pwd',
        'solo_parent',
        'senior_citizen',
        'pregnant',
    ];

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
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
            $activity->log_name = $this->wasRecentlyCreated ? 'New family ' . $eventName : 'Family ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->head_lname . ' family.';
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = 'Family';
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'Sub-Admin';
            $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' a family.';
        }else if(auth()->guard('web')->check()){
            $activity->log_name = 'Family';
            $activity->causer_id = auth()->guard('web')->user()->id;
            $activity->causer_type = 'Resident';
            $activity->description = auth()->guard('web')->user()->username . ' ' . $eventName . ' a family.';
        }
    }
}
