<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Document;

class AdminController extends Controller
{
    public function generateReportBizClearances($from, $to)
    {
        if($from > $to){
            return redirect()->route('admin.docs.biz-clearances');
        }

        $clearances = Document::with('bizClearance')
            ->where('is_released', true)
            ->where('type', 'Business Clearance')
            ->where('status', 'Released')
            ->whereHas('bizClearance', function($query) use ($from, $to) {
                $query->whereBetween('date_issued', [$from . ' 00:00:00', $to . ' 23:59:59']);
            })
            ->get();

        return view('admin.admin-business-report', [
            'clearances' => $clearances,
            'from' => $from,
            'to' => $to,
        ]);
    }

    public function markIndigency()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Indigency')->markAsRead();

        return redirect()->route('admin.docs.indigencies');
    }

    public function markBizClearance()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Business Clearance')->markAsRead();

        return redirect()->route('admin.docs.biz-clearances');
    }

    public function markBrgyClearance()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Barangay Clearance')->markAsRead();

        return redirect()->route('admin.docs.brgy-clearances');
    }

    public function assistance()
    {
        return view('admin.admin-assistance');
    }

    public function markReport()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\ReportNotification')->markAsRead();

        return redirect()->route('admin.reports');
    }

    public function indigencyTemplate(Document $document)
    {
        return view('admin.admin-template-indigency', ['document' => $document]);
    }

    public function bizClearanceTemplate(Document $document)
    {
        return view('admin.admin-template-biz-clearance', ['document' => $document]);
    }

    public function brgyClearanceTemplate(Document $document)
    {
        return view('admin.admin-template-brgy-clearance', ['document' => $document]);
    }

    public function showLoginForm()
    {
        return view('auth.admins.admins-login');
    }

    public function dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function brgyOfficials()
    {
        return view('admin.admin-profile-brgy-officials');
    }

    public function residents()
    {
        return view('admin.admin-profile-residents');
    }

    public function staffs()
    {
        return view('admin.admin-manage-staffs');
    }

    public function residentsBusiness()
    {
        return view('admin.admin-manage-residents-business');
    }

    public function approval()
    {
        return view('admin.admin-manage-approval');
    }

    public function brgyClearances()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Barangay Clearance')->markAsRead();

        return view('admin.admin-docs-brgy-clearances');
    }

    public function bizClearances()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Business Clearance')->markAsRead();

        return view('admin.admin-docs-biz-clearances');
    }

    public function indigencies()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Indigency')->markAsRead();

        return view('admin.admin-docs-indigencies');
    }

    public function reports()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\ReportNotification')->markAsRead();

        return view('admin.admin-reports');
    }

    public function message()
    {
        return view('admin.admin-message');
    }

    public function programs()
    {
        return view('admin.admin-programs');
    }

    public function audits()
    {
        return view('admin.admin-audits');
    }

    public function places()
    {
        return view('admin.admin-places');
    }

    public function archives()
    {
        return view('admin.admin-archives');
    }

    public function account()
    {
        return view('admin.admin-account');
    }
}
