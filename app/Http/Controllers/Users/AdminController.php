<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Document;

class AdminController extends Controller
{
    public function generateReportIndigencies($from, $to)
    {
        if($from > $to){
            return redirect()->route('admin.docs.indigencies');
        }

        $clearances = Document::with('indigency')
            ->where('is_released', true)
            ->where('type', 'Indigency')
            ->where('status', 'Released')
            ->whereHas('indigency', function($query) use ($from, $to) {
                $query->whereBetween('date_issued', [$from . ' 00:00:00', $to . ' 23:59:59']);
            })
            ->get();

        return view('admin.admin-indigency-report', [
            'clearances' => $clearances,
            'from' => $from,
            'to' => $to,
        ]);
    }
    
    public function generateReportBrgyClearances($from, $to)
    {
        if($from > $to){
            return redirect()->route('admin.docs.brgy-clearances');
        }

        $clearances = Document::with('brgyClearance')
            ->where('is_released', true)
            ->where('type', 'Barangay Clearance')
            ->where('status', 'Released')
            ->whereHas('brgyClearance', function($query) use ($from, $to) {
                $query->whereBetween('date_issued', [$from . ' 00:00:00', $to . ' 23:59:59']);
            })
            ->get();

        return view('admin.admin-brgy-clearance-report', [
            'clearances' => $clearances,
            'from' => $from,
            'to' => $to,
        ]);
    }

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

    public function assistance()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\AssistanceNotification')->markAsRead();

        if(auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\AssistanceNotification')->count() > 0){
            return redirect()->route('admin.assitance');
        }

        return view('admin.admin-assistance');
    }

    public function manageBusiness()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredBusinessNotification')->markAsRead();

        if(auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredBusinessNotification')->count() > 0){
            return redirect()->route('admin.manage.business');
        }

        return view('admin.admin-manage-business');
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

    public function brgyClearances()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Barangay Clearance')->markAsRead();

        if(auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Barangay Clearance')->count() > 0){
            return redirect()->route('admin.docs.brgy-clearances');
        }

        return view('admin.admin-docs-brgy-clearances');
    }

    public function bizClearances()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Business Clearance')->markAsRead();

        if(auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Business Clearance')->count() > 0){
            return redirect()->route('admin.docs.biz-clearances');
        }

        return view('admin.admin-docs-biz-clearances');
    }

    public function indigencies()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Indigency')->markAsRead();

        if(auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document', 'Indigency')->count() > 0){
            return redirect()->route('admin.docs.indigencies');
        }

        return view('admin.admin-docs-indigencies');
    }

    public function reports()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\ReportNotification')->markAsRead();

        if(auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\ReportNotification')->count() > 0){
            return redirect()->route('admin.reports');
        }

        return view('admin.admin-reports');
    }

    public function places()
    {
        auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\PlacesNotification')->markAsRead();

        if(auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\PlacesNotification')->count() > 0){
            return redirect()->route('admin.places');
        }

        return view('admin.admin-places');
    }
}
