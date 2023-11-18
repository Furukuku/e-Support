<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use App\Traits\MustVerifyMobile;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Spatie\Activitylog\Contracts\Activity;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Interfaces\MustVerifyMobile as IMustVerifyMobile;
use Illuminate\Contracts\Auth\CanResetPassword;

class Business extends Authenticatable implements IMustVerifyMobile, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    use SoftDeletes;

    use MustVerifyMobile;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'profile',
        'biz_clearance',
        'biz_name',
        'biz_address',
        'biz_nature',
        'lname',
        'fname',
        'mname',
        'sname',
        'mobile',
        'mobile_verify_code',
        'mobile_verify_code_exp',
        'is_approved',
        'is_active',
        'username',
        'email',
        'password',
        'decline_msg',
        'disable_msg',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'mobile_verify_code',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function place()
    {
        return $this->hasOne(Place::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->mobile;
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
            $activity->log_name = 'Business account ' . $eventName;
            $activity->causer_id = auth()->guard('admin')->user()->id;
            $activity->causer_type = 'Admin';
            // $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' a business account.';
            // if($this->isDirty('is_approved') && $this->is_approved == 1){
            //     $activity->description = Str::endsWith($this->username, 's') ? auth()->guard('admin')->user()->username . ' approved ' . $this->username  . "' account." : auth()->guard('admin')->user()->username . ' approved ' . $this->username  . "'s account.";
            // }else if($this->isDirty('is_active')){
            //     if($this->is_active == 1){
            //             $activity->description = Str::endsWith($this->username, 's') ? auth()->guard('admin')->user()->username . ' enabled ' . $this->username  . "' account." : auth()->guard('admin')->user()->username . ' enabled ' . $this->username  . "'s account.";
            //     }else{
            //         $activity->description = Str::endsWith($this->username, 's') ? auth()->guard('admin')->user()->username . ' disabled ' . $this->username  . "' account." : auth()->guard('admin')->user()->username . ' disabled ' . $this->username  . "'s account.";
            //     }
            // }else{
            // }
            if(Str::endsWith($this->username, 's')){
                $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->username  . "' account.";
            }else{
                $activity->description = auth()->guard('admin')->user()->username . ' ' . $eventName . ' ' . $this->username  . "'s account.";
            }
        }else{
            activity()->disableLogging();
        }
        // else if(auth()->guard('sub-admin')->check()){
        //     $activity->log_name = 'Business Account';
        //     $activity->causer_id = auth()->guard('sub-admin')->user()->id;
        //     $activity->causer_type = 'Sub-Admin';
        //     if(Str::endsWith($this->username, 's')){
        //         $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->username  . "' account.";
        //     }else{
        //         $activity->description = auth()->guard('sub-admin')->user()->username . ' ' . $eventName . ' ' . $this->username  . "'s account.";
        //     }
        // }else if(auth()->guard('business')->check()){

        // }else{
        //     $activity->log_name = 'New business account ' . $eventName;
        //     $activity->causer_id = $this->id;
        //     $activity->causer_type = 'Business Owner';
        //     $activity->description = $this->username . ' ' . $eventName . ' their account.';
        // }
    }
}
