<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BHWController extends Controller
{
    public function residents()
    {
        return view('bhw.bhw-residents');
    }

    public function patients()
    {
        return view('bhw.bhw-patients');
    }
}
