<?php

namespace App\Http\Controllers\Users;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ResidentController extends Controller
{
    public function updateReport(Request $request, Report $report)
    {
        $request->validate([
            'kind_of_report' => ['required', 'string', 'max:16'],
            'zone' => ['required', 'string', 'max:1'],
            'photo' => [File::image()],
            'description' => ['required', 'string'],
        ]);

        if($request->hasFile('photo')){
            Storage::delete($report->report_img);
            $photo_filename = $request->photo->store('public/images/reports');

            $report->report_name = $request->kind_of_report;
            $report->zone = $request->zone;
            $report->description = $request->description;
            $report->report_img = $photo_filename;
            $report->update();
        }else{
            $report->report_name = $request->kind_of_report;
            $report->zone = $request->zone;
            $report->description = $request->description;
            $report->update();
        }

        return redirect()->route('resident.services');
    }

    public function viewReport(Report $report, $id)
    {
        if(Auth::guard('web')->check() && auth()->guard('web')->id() == $id){
            return view('resident.reports.view-report', ['report' => $report]);
        }else{
            abort(404);
        }
    }

    public function report(Request $request)
    {
        $request->validate(
            [
                'kind_of_report' => ['required', 'string', 'max:16'],
                'zone' => ['required', 'string', 'max:1'],
                'photo' => ['required', File::image()],
                'latitude' => ['required', 'string'],
                'longitude' => ['required', 'string'],
                'description' => ['required', 'string'],
            ],
            [
                'latitude' => [
                    'required' => 'Your current location is required.',
                    'string' => 'The current location must be a valid location.',
                ]
            ]
        );

        if(Auth::guard('web')->check()){
            $photo_filename = $request->photo->store('public/images/reports');
    
            Report::create([
                'user_id' => auth()->guard('web')->id(),
                'report_name' => $request->kind_of_report,
                'zone' => $request->zone,
                'report_img' => $photo_filename,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('resident.services');
    }

    public function updateIndigency(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:155'],
        ]);

        if($validated){
            $document = Document::find($id);
            $document->update($validated);
        }

        return redirect()->route('resident.services');
    }

    public function updateBizClearance(Request $request, $id){
        $request->validate([
            'business_nature' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'owner_address' => ['required', 'string', 'max:255'],
            'business_address' => ['required', 'string', 'max:255'],
            'proof' => [File::image()],
        ]);
        // dd($request->proof);
        if($request->hasFile('proof')){
            $document = Document::find($id);

            $proof_filename = $request->proof->store('public/images/biz-clearances/proofs');
            Storage::delete($document->proof);

            $document->biz_nature = $request->business_nature;
            $document->biz_owner = $request->owner_name;
            $document->biz_name = $request->business_name;
            $document->owner_address = $request->owner_address;
            $document->biz_address = $request->business_address;
            $document->proof = $proof_filename;
            $document->update();
        }else{
            $document = Document::find($id);
            $document->biz_nature = $request->business_nature;
            $document->biz_owner = $request->owner_name;
            $document->biz_name = $request->business_name;
            $document->owner_address = $request->owner_address;
            $document->biz_address = $request->business_address;
            $document->update();
        }

        return redirect()->route('resident.services');
    }

    public function updateBrgyClearance(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:155'],
            'zone' => ['required', 'string', 'max:1'],
            'purpose' => ['required', 'string', 'max:155'],
        ]);

        $document = Document::find($id);

        if($validated){
            $document->update($validated);

            return redirect()->route('resident.services');
        }
    }

    public function editDocs($id, $token)
    {
        $document = Document::where('id', $id)
            ->where('token', $token)
            ->first();

        if(!is_null($document)){
            if($document->type === 'Barangay Clearance'){
                return view('resident.documents.edit-documents.brgy-clearance', ['document' => $document]);
            }else if($document->type === 'Business Clearance'){
                return view('resident.documents.edit-documents.business-clearance', ['document' => $document]);
            }else if($document->type === 'Indigency'){
                return view('resident.documents.edit-documents.indigency', ['document' => $document]);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

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

        return view('resident.qr-code', ['qr_code' => $qr_code]);
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

    public function storeIndigency(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:155'],
        ]);

        if(Auth::guard('web')->check()){
            $token = uniqid(Str::random(10), true);

            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Indigency';
            $document->name = $request->name;
            $document->token = $token;
            $document->save();

            return redirect()->route('resident.qr-code', ['token' => $token]);
        }else{
            return redirect()->route('resident.indigency');
        }
    }

    public function storeBrgyClearance(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:155'],
            'zone' => ['required', 'string', 'max:1'],
            'purpose' => ['required', 'string', 'max:155'],
        ]);

        if(Auth::guard('web')->check()){
            $token = uniqid(Str::random(10), true);

            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Barangay Clearance';
            $document->name = $request->name;
            $document->zone = $request->zone;
            $document->purpose = $request->purpose;
            $document->token = $token;
            $document->save();

            return redirect()->route('resident.qr-code', ['token' => $token]);
        }else{
            return redirect()->route('resident.brgy-clearance');
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
        $jobs = Job::inRandomOrder()->take(10)->get();

        return view('resident.resident-home', ['jobs' => $jobs]);
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
