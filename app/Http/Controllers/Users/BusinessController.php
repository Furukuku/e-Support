<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.users.register-company');
    }

    public function home()
    {
        return view('business.business-home');
    }
}
