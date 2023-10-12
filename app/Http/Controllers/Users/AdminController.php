<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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

    public function clearance()
    {
        return view('admin.admin-print-clearance');
    }

    public function permit()
    {
        return view('admin.admin-print-biz-permit');
    }

    public function indigency()
    {
        return view('admin.admin-print-indigency');
    }

    public function reports()
    {
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
