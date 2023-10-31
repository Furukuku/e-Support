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

    public function clearance()
    {
        return view('sub-admin.sub-admin-print-clearance');
    }

    public function permit()
    {
        return view('sub-admin.sub-admin-print-biz-permit');
    }

    public function indigency()
    {
        return view('sub-admin.sub-admin-print-indigency');
    }

    public function account()
    {
        return view('sub-admin.sub-admin-account');
    }
}
