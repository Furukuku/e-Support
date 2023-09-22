<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubAdminController extends Controller
{
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
