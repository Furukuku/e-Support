<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class SubAdminController extends Controller
{
    public function indigencyTemplate(Document $document)
    {
        return view('sub-admin.sub-admin-template-indigency', ['document' => $document]);
    }

    public function bizClearanceTemplate(Document $document)
    {
        return view('sub-admin.sub-admin-template-biz-clearance', ['document' => $document]);
    }

    public function brgyClearanceTemplate(Document $document)
    {
        return view('sub-admin.sub-admin-template-brgy-clearance', ['document' => $document]);
    }

    public function dashboard()
    {
        return view('sub-admin.sub-admin-dashboard');
    }

    public function residents()
    {
        return view('sub-admin.sub-admin-residents');
    }

    public function reports()
    {
        auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\ReportNotification')->markAsRead();

        if(auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\ReportNotification')->count() > 0){
            return redirect()->route('sub-admin.reports');
        }

        return view('sub-admin.sub-admin-reports');
    }

    public function programs()
    {
        return view('sub-admin.sub-admin-programs');
    }

    public function places()
    {
        return view('sub-admin.sub-admin-places');
    }

    public function brgyClearance()
    {
        auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Barangay Clearance')->markAsRead();

        if(auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Barangay Clearance')->count() > 0){
            return redirect()->route('sub-admin.docs.brgy-clearances');
        }

        return view('sub-admin.sub-admin-print-clearance');
    }

    public function bizClearance()
    {
        auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Business Clearance')->markAsRead();

        if(auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Business Clearance')->count() > 0){
            return redirect()->route('sub-admin.docs.biz-clearances');
        }

        return view('sub-admin.sub-admin-print-biz-permit');
    }

    public function indigency()
    {
        auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Indigency')->markAsRead();

        if(auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Indigency')->count() > 0){
            return redirect()->route('sub-admin.docs.indigencies');
        }

        return view('sub-admin.sub-admin-print-indigency');
    }

    public function account()
    {
        return view('sub-admin.sub-admin-account');
    }
}
