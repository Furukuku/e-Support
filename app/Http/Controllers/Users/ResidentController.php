<?php

namespace App\Http\Controllers\Users;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ResidentController extends Controller
{
    public function showQr($token)
    {
        $document = Document::where('token', $token)
            ->select('id')
            ->first();

        $qr = collect([
            'id' => $document->id,
            'token' => $token,
        ]);

        $qr_code = QrCode::size(200)->generate($qr);

        return view('resident2.qr-code', ['qr_code' => $qr_code]);
    }

    public function storeBizClearance(Request $request)
    {
        $request->validate([
            'business_nature' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'owner_address' => ['required', 'string', 'max:255'],
            'business_address' => ['required', 'string', 'max:255'],
            'proof' => ['required', File::image(),],
        ]);

        // $qr_password = Hash::make('esupport-biz-clearance-qr-password');

        // dd(uniqid('biz-clearance', true));

        // $qr_code = collect([
        //     'password' => $qr_password,
        //     'id' => '1',
        // ]);

        // return redirect()->route('qr-code', ['qr_code' => $qr_code]);

        if(Auth::guard('web')->check()){
            $proof_filename = $request->proof->store('public/images/biz-clearances/proofs');
            $token = uniqid(Str::random(10), true);
            

            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Business Clearance';
            $document->biz_name = $request->business_name;
            $document->biz_address = $request->business_address;
            $document->biz_nature = $request->business_nature;
            $document->biz_owner = $request->owner_name;
            $document->owner_address = $request->owner_address;
            $document->proof = $proof_filename;
            $document->token = $token;
            $document->save();

            return redirect()->route('resident.qr-code', ['token' => $token]);
        }else{
            return redirect()->route('resident.biz-clearance');
        }
    }

    public function showLoginForm()
    {
        return view('auth.users.login');
    }

    public function showRegisterForm()
    {
        return view('auth.users.register-resident');
    }

    public function showOtpVerifyForm($user)
    {
        return view('auth.users.otp-verifications.resident-otp', ['user' => $user]);
    }

    public function home()
    {
        return view('resident.resident-home');
    }

    public function documents()
    {
        return view('resident.resident-documents');
    }

    public function reports()
    {
        return view('resident.resident-reports');
    }

    public function account()
    {
        return view('resident.resident-account');
    }
}
