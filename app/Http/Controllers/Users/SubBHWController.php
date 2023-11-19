<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubBHWController extends Controller
{
    public function residentAccounts()
    {
        auth()->guard('bhw')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredResidentNotification')->where('data.user_zone', auth()->guard('bhw')->user()->assigned_zone)->markAsRead();

        if(auth()->guard('bhw')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredResidentNotification')->where('data.user_zone', auth()->guard('bhw')->user()->assigned_zone)->count() > 0){
            return redirect()->route('sub-bhw.resident-accounts');
        }

        return view('sub-bhw.sub-bhw-resident-accounts');
    }

    public function families()
    {
        auth()->guard('bhw')->user()->unreadNotifications->where('type', 'App\Notifications\FamilyNotification')->where('data.family_zone', auth()->guard('bhw')->user()->assigned_zone)->markAsRead();

        if(auth()->guard('bhw')->user()->unreadNotifications->where('type', 'App\Notifications\FamilyNotification')->where('data.family_zone', auth()->guard('bhw')->user()->assigned_zone)->count() > 0){
            return redirect()->route('sub-bhw.family-profiles');
        }

        return view('sub-bhw.sub-bhw-family-profiles');
    }
}
