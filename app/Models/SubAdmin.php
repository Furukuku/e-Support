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

class SubAdmin extends Authenticatable
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
        'position',
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
        ->logOnlyDirty();
    }

    public function tapActivity(Activity $activity, string $eventName)
    {
        if(auth()->guard('admin')->check()){
            $admin_username = auth()->guard('admin')->user()->username;

            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            // $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->username;

            if($this->wasRecentlyCreated){
                $activity->log_name = $this->position === 'BHW' ? 'New BHW account ' . $eventName : 'New Barangay official account ' . $eventName;
            }else{
                $activity->log_name = $this->position === 'BHW' ? 'BHW account ' . $eventName : 'Barangay official account ' . $eventName;
            }

            if($this->isDirty('is_active')){
                if($this->is_active == 1){
                    $activity->description = Str::endsWith($this->username, 's') ? $admin_username . ' enabled ' . $this->username  . "' account." : $admin_username . ' enabled ' . $this->username  . "'s account.";
                }else{
                    $activity->description = Str::endsWith($this->username, 's') ? $admin_username . ' disabled ' . $this->username  . "' account." : $admin_username . ' disabled ' . $this->username  . "'s account.";
                }
            }else{
                $activity->description = Str::endsWith($this->username, 's') ? $admin_username . ' ' . $eventName  . ' ' . $this->username . "' account." : $admin_username . ' ' . $eventName  . ' ' . $this->username . "'s account.";
            }
            
        }else if(auth()->guard('sub-admin')->check()){
            $activity->log_name = 'Sub-admin';
            $activity->causer_id = auth()->guard('sub-admin')->user()->id;
            $activity->causer_type = 'Sub-Admin';
            $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' a sub-admin.';
        }else{
            $activity->log_name = 'Sub-admin';
            $activity->causer_id = auth()->guard('web')->user()->id;
            $activity->causer_type = 'Resident';
            $activity->description = auth()->guard('web')->user()->username . ' ' . $eventName . ' a sub-admin.';
        }
    }
}
