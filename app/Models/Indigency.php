<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Indigency extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'indigencies';

    protected $fillable = [
        'document_id',
        'name',
        'purpose',
        'date_issued',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'name',
            'purpose',
            'date_issued',
            'document.type',
            'document.status',
            'document.is_released',
        ])
        ->logOnlyDirty();
    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        if(auth()->guard('admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Barangay Indigency ' . $eventName : 'Barangay Indigency ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            if(Str::endsWith($this->name, 's')){
                $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->name  . "' Barangay Indigency.";
            }else{
                $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->name  . "'s Barangay Indigency.";
            }
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New Barangay Indigency ' . $eventName : 'Barangay Indigency ' . $eventName;
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'Sub-Admin';
            if(Str::endsWith($this->name, 's')){
                $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->name  . "' Barangay Indigency.";
            }else{
                $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->name  . "'s Barangay Indigency.";
            }
        }else{
            activity()->disableLogging();
        }
    }
}
