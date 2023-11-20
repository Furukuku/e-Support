<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrgyOfficial extends Model
{
    use HasFactory, LogsActivity;

    use SoftDeletes;

    protected $table = 'brgy_officials';

    protected $fillable = [
        'display_img',
        'lname',
        'fname',
        'mname',
        'sname',
        'zone',
        'gender',
        'contact',
        'email',
        'civil_status',
        'bday',
        'position',
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
            $official_name = $this->position . ' ' . $this->fname . ' ' . $this->lname;

            $activity->log_name = $this->wasRecentlyCreated ? 'New barangay official profile ' . $eventName : 'Barangay official profile ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            $activity->description = Str::endsWith($this->lname, 's') ? auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $official_name . "' profile." : auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $official_name . "'s profile.";
        }else{
            activity()->disableLogging();
        }
    }
}
