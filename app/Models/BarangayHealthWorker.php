<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BarangayHealthWorker extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lname',
        'fname',
        'mname',
        'assigned_zone',
        'is_active',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logFillable()
        ->dontLogIfAttributesChangedOnly([
            'password',
            'remember_token'
        ])
        ->logOnlyDirty();
    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        if(auth()->guard('sub-admin')->check()){
            $activity->log_name = $this->wasRecentlyCreated ? 'New BHW account ' . $eventName : 'BHW account ' . $eventName;
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = auth()->guard('sub-admin')->user()->position === 'BHW' ? 'BHW' : 'Sub-Admin';
            $activity->description = Str::endsWith($this->username, 's') ? auth()->guard('sub-admin')->user()->username . ' ' . $eventName  . ' ' . $this->username . "' account." : auth()->guard('sub-admin')->user()->username . ' ' . $eventName  . ' ' . $this->username . "'s account.";
        }else if(auth()->guard('bhw')->check()){
            
            $activity->log_name = 'BHW account ' . $eventName;
            $activity->causer_id = auth()->guard('bhw')->user()->id;
            $activity->causer_type = 'Sub-BHW';
            $activity->description = auth()->guard('bhw')->user()->username . ' ' . $eventName . ' his/her account.';
        }
    }
}
