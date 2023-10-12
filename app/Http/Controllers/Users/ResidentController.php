<?php

namespace App\Http\Controllers\Users;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BarangayClearance;
use App\Models\BusinessClearance;
use App\Models\Indigency;
use App\Models\Job;
use App\Models\Report;
use App\Models\ReportImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ResidentController extends Controller
{
    public function viewJob(Job $job)
    {
        if($job->done_hiring == true){
            abort(404);
        }
        
        return view('resident.job', ['job' => $job]);
    }

    public function updateReport(Request $request, Report $report)
    {
        $request->validate([
            'kind_of_report' => ['required', 'string', 'max:16'],
            'zone' => ['required', 'string', 'max:1'],
            'photo.*' => [File::image()],
            'photo' => ['max:3'],
            'description' => ['required', 'string'],
        ]);

        if($request->hasFile('photo')){
            $images = ReportImage::where('report_id', $report->id)->get();
            foreach($images as $image){
                Storage::delete($image->image);
                $image->delete();
            }
            
            $report->report_name = $request->kind_of_report;
            $report->zone = $request->zone;
            $report->description = $request->description;
            $report->update();

            foreach($request->file('photo') as $photo){
                $photo_filename = $photo->store('public/images/reports');

                ReportImage::create([
                    'report_id' => $report->id,
                    'image' => $photo_filename,
                ]);
            }
        }else{
            $report->report_name = $request->kind_of_report;
            $report->zone = $request->zone;
            $report->description = $request->description;
            $report->update();
        }

        return redirect()->route('resident.services');
    }

    public function viewReport(Report $report)
    {
        if(Auth::guard('web')->check() && $report->user_id == auth()->guard('web')->id()){
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
                'photo.*' => [File::image()],
                'photo' => ['required', 'min:1', 'max:3'],
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
            
            $report = new Report();
            $report->user_id = auth()->guard('web')->id();
            $report->report_name = $request->kind_of_report;
            $report->zone = $request->zone;
            $report->latitude = $request->latitude;
            $report->longitude = $request->longitude;
            $report->description = $request->description;
            $report->save();
            
            foreach($request->file('photo') as $photo){
                $photo_filename = $photo->store('public/images/reports');

                ReportImage::create([
                    'report_id' => $report->id,
                    'image' => $photo_filename,
                ]);
            }
        }

        return redirect()->route('resident.services');
    }

    public function updateIndigency(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'purpose' => ['required', 'string', 'max:255'],
        ]);

        $document = Document::find($id);
        $document->indigency->name = $request->name;
        $document->indigency->purpose = $request->purpose;
        $document->indigency->update();

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
            'ctc_image' => [File::image()],
            'ctc' => ['required', 'string', 'max:255'],
            'issued_at' => ['required', 'string', 'max:255'],
            'issued_on' => ['required', 'date'],
        ]);

        $document = Document::find($id);

        if($request->hasFile('proof')){
            Storage::delete($document->bizClearance->proof);
            $proof_filename = $request->proof->store('public/images/clearances/business/proofs');
            $document->bizClearance->proof = $proof_filename;
        }

        if($request->hasFile('ctc_image')){
            Storage::delete($document->bizClearance->ctc_photo);
            $ctc_filename = $request->ctc_image->store('public/images/clearances/business/ctc');
            $document->bizClearance->ctc_photo = $ctc_filename;
        }

        $document->bizClearance->biz_nature = $request->business_nature;
        $document->bizClearance->biz_owner = $request->owner_name;
        $document->bizClearance->biz_name = $request->business_name;
        $document->bizClearance->owner_address = $request->owner_address;
        $document->bizClearance->biz_address = $request->business_address;
        $document->bizClearance->ctc = $request->ctc;
        $document->bizClearance->issued_at = $request->issued_at;
        $document->bizClearance->issued_on = $request->issued_on;
        $document->bizClearance->update();

        return redirect()->route('resident.services');
    }

    public function updateBrgyClearance(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'zone' => ['required', 'string', 'max:1'],
            'purpose' => ['required', 'string', 'max:255'],
            'ctc_image' => [File::image()],
            'ctc' => ['required', 'string', 'max:255'],
            'issued_at' => ['required', 'string', 'max:255'],
            'issued_on' => ['required', 'date'],
        ]);

        $document = Document::find($id);

        if($request->hasFile('ctc_image')){
            Storage::delete($document->brgyClearance->ctc_photo);
            $ctc_filename = $request->ctc_image->store('public/images/clearances/barangay');
            $document->brgyClearance->ctc_photo = $ctc_filename;
        }
        
        $document->brgyClearance->name = $request->name;
        $document->brgyClearance->zone = $request->zone;
        $document->brgyClearance->purpose = $request->purpose;
        $document->brgyClearance->ctc = $request->ctc;
        $document->brgyClearance->issued_at = $request->issued_at;
        $document->brgyClearance->issued_on = $request->issued_on;
        $document->brgyClearance->update();


        return redirect()->route('resident.services');
    }

    public function editDocs($id, $token)
    {
        $document = Document::with(['brgyClearance', 'bizClearance', 'indigency'])
            ->where('id', $id)
            ->where('token', $token)
            ->first();

        if(!is_null($document) && $document->user_id == auth()->guard('web')->id()){
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
            ->select('id', 'user_id')
            ->first();

        if($document->user_id == auth()->guard('web')->id()){
            $qr = collect([
                'id' => $document->id,
                'token' => $token,
            ]);
    
            $qr_code = QrCode::size(200)->generate($qr);
    
            return view('resident.qr-code', ['qr_code' => $qr_code]);
        }else{
            abort(404);
        }
    }

    public function storeBizClearance(Request $request)
    {
        $request->validate([
            'business_nature' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'owner_address' => ['required', 'string', 'max:255'],
            'business_address' => ['required', 'string', 'max:255'],
            'proof' => ['required', File::image()],
            'ctc_image' => ['required', File::image()],
            'ctc' => ['required', 'string', 'max:255'],
            'issued_at' => ['required', 'string', 'max:255'],
            'issued_on' => ['required', 'date'],
        ]);

        if(Auth::guard('web')->check()){
            $proof_filename = $request->proof->store('public/images/clearances/business/proofs');
            $ctc_filename = $request->ctc_image->store('public/images/clearances/business/ctc');
            $token = uniqid(Str::random(10), true);
            

            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Business Clearance';
            $document->token = $token;
            $document->save();

            $bizClearance = new BusinessClearance();
            $bizClearance->document_id = $document->id;
            $bizClearance->biz_name = $request->business_name;
            $bizClearance->biz_address = $request->business_address;
            $bizClearance->biz_nature = $request->business_nature;
            $bizClearance->biz_owner = $request->owner_name;
            $bizClearance->owner_address = $request->owner_address;
            $bizClearance->proof = $proof_filename;
            $bizClearance->ctc_photo = $ctc_filename;
            $bizClearance->ctc = $request->ctc;
            $bizClearance->issued_at = $request->issued_at;
            $bizClearance->issued_on = $request->issued_on;
            $bizClearance->save();

            return redirect()->route('resident.qr-code', ['token' => $token]);
        }else{
            return redirect()->route('resident.biz-clearance');
        }
    }

    public function storeIndigency(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'purpose' => ['required', 'string', 'max:255'],
        ]);

        if(Auth::guard('web')->check()){
            $token = uniqid(Str::random(10), true);

            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Indigency';
            $document->token = $token;
            $document->save();

            $indigency = new Indigency();
            $indigency->document_id = $document->id;
            $indigency->name = $request->name;
            $indigency->purpose = $request->purpose;
            $indigency->save();

            return redirect()->route('resident.qr-code', ['token' => $token]);
        }else{
            return redirect()->route('resident.indigency');
        }
    }

    public function storeBrgyClearance(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'zone' => ['required', 'string', 'max:1'],
            'purpose' => ['required', 'string', 'max:255'],
            'ctc_image' => ['required', File::image()],
            'ctc' => ['required', 'string', 'max:255'],
            'issued_at' => ['required', 'string', 'max:255'],
            'issued_on' => ['required', 'date'],
        ]);

        if(Auth::guard('web')->check()){
            $ctc_filename = $request->ctc_image->store('public/images/clearances/barangay');
            $token = uniqid(Str::random(10), true);

            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Barangay Clearance';
            $document->token = $token;
            $document->save();

            $brgyClearance = new BarangayClearance();
            $brgyClearance->document_id = $document->id;
            $brgyClearance->name = $request->name;
            $brgyClearance->zone = $request->zone;
            $brgyClearance->purpose = $request->purpose;
            $brgyClearance->ctc_photo = $ctc_filename;
            $brgyClearance->ctc = $request->ctc;
            $brgyClearance->issued_at = $request->issued_at;
            $brgyClearance->issued_on = $request->issued_on;
            $brgyClearance->save();

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
        $jobs = Job::with('business')->where('done_hiring', false)->inRandomOrder()->take(10)->get();

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
