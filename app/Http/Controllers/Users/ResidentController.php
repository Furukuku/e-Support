<?php

namespace App\Http\Controllers\Users;

use App\Events\SendReport;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BarangayClearance;
use App\Models\BusinessClearance;
use App\Models\FamilyHead;
use App\Models\Indigency;
use App\Models\Job;
use App\Models\Place;
use App\Models\Report;
use App\Models\ReportImage;
use App\Models\Wife;
use App\Notifications\DocumentNotification;
use App\Notifications\ReportNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Notification;

class ResidentController extends Controller
{
    public function generateReportResidents()
    {
        $heads = FamilyHead::with(['wife', 'familyMembers'])
            ->where('is_approved', true)
            ->get();
        
        $ageCounts = [];

        // Initialize the ageCounts array with counts set to 0 for ages from 0 to 80
        for ($i = 0; $i <= 80; $i++) {
            $ageCounts[$i] = [
                'male' => 0,
                'female' => 0,
                'total' => 0,
            ];
        }

        foreach ($heads as $head) {
            $head_age = Carbon::parse($head->bday)->age;
            
            // Increment the count for the corresponding age
            if ($head_age >= 0 && $head_age < 80) {
                $ageCounts[$head_age]['total']++;
                if($head->sex === 'Male'){
                    $ageCounts[$head_age]['male']++;
                }else if($head->sex === 'Female'){
                    $ageCounts[$head_age]['female']++;
                }
            }else if($head_age >= 80){
                $ageCounts[80]['total']++;
                if($head->sex === 'Male'){
                    $ageCounts[80]['male']++;
                }else if($head->sex === 'Female'){
                    $ageCounts[80]['female']++;
                }
            }
            
            if($head->wife){
                $wife_age = Carbon::parse($head->wife->bday)->age;
                if ($wife_age >= 0 && $wife_age < 80) {
                    $ageCounts[$wife_age]['total']++;
                    $ageCounts[$wife_age]['female']++;
                }else if($wife_age >= 80){
                    $ageCounts[80]['total']++;
                    $ageCounts[80]['female']++;
                }
            }

            if($head->familyMembers && count($head->familyMembers) > 0){
                foreach($head->familyMembers as $member){
                    $member_age = Carbon::parse($member->bday)->age;

                    if ($member_age >= 0 && $member_age < 80) {
                        $ageCounts[$member_age]['total']++;
                        if($member->sex === 'Male'){
                            $ageCounts[$member_age]['male']++;
                        }else if($member->sex === 'Female'){
                            $ageCounts[$member_age]['female']++;
                        }
                    }else if($member_age >= 80){
                        $ageCounts[80]['total']++;
                        if($member->sex === 'Male'){
                            $ageCounts[80]['male']++;
                        }else if($member->sex === 'Female'){
                            $ageCounts[80]['female']++;
                        }
                    }
                }
            }
        }

        $minor_male = 0;
        $minor_female = 0;
        $minor_total = 0;
        for($i = 0; $i < 18; $i++){
            $minor_male += $ageCounts[$i]['male'];
            $minor_female += $ageCounts[$i]['female'];
            $minor_total += $ageCounts[$i]['total'];
        }

        $adult_male = 0;
        $adult_female = 0;
        $adult_total = 0;
        for($i = 18; $i < 80; $i++){
            $adult_male += $ageCounts[$i]['male'];
            $adult_female += $ageCounts[$i]['female'];
            $adult_total += $ageCounts[$i]['total'];
        }

        
        $senior_male = $ageCounts[80]['male'];
        $senior_female = $ageCounts[80]['female'];
        $senior_total = $ageCounts[80]['total'];

        $total_fam = $heads->count();

        $households = FamilyHead::select('house_no', DB::raw('count(*) as total'))
            ->groupBy('house_no')
            ->get();

        $total_households = $households->count();

        return view('bhw.bhw-generate-report-residents', [
            'ageCounts' => $ageCounts,
            'minor_male' => $minor_male,
            'minor_female' => $minor_female,
            'minor_total' => $minor_total,
            'adult_male' => $adult_male,
            'adult_female' => $adult_female,
            'adult_total' => $adult_total,
            'senior_male' => $senior_male,
            'senior_female' => $senior_female,
            'senior_total' => $senior_total,
            'total_fam' => $total_fam,
            'total_households' => $total_households,
        ]);
    }

    public function viewJob(Job $job)
    {
        if($job->done_hiring == true){
            abort(404);
        }
        
        return view('resident.job', ['job' => $job]);
    }

    public function updateReport(Request $request, Report $report)
    {
        if($request->kind_of_report === 'Others'){
            $request->validate(
                [
                    'kind_of_report' => ['required', 'string', 'max:30'],
                    'others' => ['required', 'string', 'max:255'],
                    'zone' => ['required', 'string', 'max:1'],
                    'photo.*' => [File::image()],
                    'photo' => ['max:3'],
                    'latitude' => ['required', 'string', 'max:100'],
                    'longitude' => ['required', 'string', 'max:100'],
                    'description' => ['required', 'string'],
                ],
                [
                    'latitude' => [
                        'required' => 'The location is required.',
                        'string' => 'The location must be a valid location.',
                        'max' => 'The location must not exceed 100 characters.',
                    ]
                ]
            );
        }else{
            $request->validate(
                [
                    'kind_of_report' => ['required', 'string', 'max:30'],
                    'zone' => ['required', 'string', 'max:1'],
                    'photo.*' => [File::image()],
                    'photo' => ['max:3'],
                    'latitude' => ['required', 'string', 'max:100'],
                    'longitude' => ['required', 'string', 'max:100'],
                    'description' => ['required', 'string'],
                ],
                [
                    'latitude' => [
                        'required' => 'The location is required.',
                        'string' => 'The location must be a valid location.',
                        'max' => 'The location must not exceed 100 characters.',
                    ]
                ]
            );
        }

        if($request->hasFile('photo')){
            $images = ReportImage::where('report_id', $report->id)->get();
            foreach($images as $image){
                Storage::delete($image->image);
                $image->delete();
            }
            
            $report->report_name = $request->kind_of_report === 'Others' ? $request->others : $request->kind_of_report;
            $report->zone = $request->zone;
            $report->latitude = $request->latitude;
            $report->longitude = $request->longitude;
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
            $report->report_name = $request->kind_of_report === 'Others' ? $request->others : $request->kind_of_report;
            $report->zone = $request->zone;
            $report->latitude = $request->latitude;
            $report->longitude = $request->longitude;
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
        if($request->kind_of_report === 'Others'){
            $request->validate(
                [
                    'kind_of_report' => ['required', 'string', 'max:30'],
                    'others' => ['required', 'string', 'max:255'],
                    'zone' => ['required', 'string', 'max:1'],
                    'photo.*' => [File::image()],
                    'photo' => ['required', 'min:1', 'max:3'],
                    'latitude' => ['required', 'string', 'max:100'],
                    'longitude' => ['required', 'string', 'max:100'],
                    'description' => ['required', 'string'],
                ],
                [
                    'latitude' => [
                        'required' => 'The location is required.',
                        'string' => 'The location must be a valid location.',
                        'max' => 'The location must not exceed 100 characters.',
                    ]
                ]
            );
        }else{
            $request->validate(
                [
                    'kind_of_report' => ['required', 'string', 'max:30'],
                    'zone' => ['required', 'string', 'max:1'],
                    'photo.*' => [File::image()],
                    'photo' => ['required', 'min:1', 'max:3'],
                    'latitude' => ['required', 'string', 'max:100'],
                    'longitude' => ['required', 'string', 'max:100'],
                    'description' => ['required', 'string'],
                ],
                [
                    'latitude' => [
                        'required' => 'The location is required.',
                        'string' => 'The location must be a valid location.',
                        'max' => 'The location must not exceed 100 characters.',
                    ]
                ]
            );
        }

        if(Auth::guard('web')->check()){
            if($request->kind_of_report === 'Others'){
                $checkReport = Report::where('report_name', $request->others)
                    ->where('zone', $request->zone)
                    ->where('is_exist', true)
                    ->where('time_interval', '>', now())
                    ->where('created_at', '<', now())
                    ->first();
            }else{
                $checkReport = Report::where('report_name', $request->kind_of_report)
                    ->where('zone', $request->zone)
                    ->where('is_exist', true)
                    ->where('time_interval', '>', now())
                    ->where('created_at', '<', now())
                    ->first();
            }

            $report = new Report();
            $report->user_id = auth()->guard('web')->id();
            $report->report_name = $request->kind_of_report === 'Others' ? $request->others : $request->kind_of_report;
            $report->zone = $request->zone;
            $report->latitude = $request->latitude;
            $report->longitude = $request->longitude;
            $report->description = $request->description;
            if(is_null($checkReport)){
                $report->is_exist = true;
                $report->time_interval = now()->addRealMinutes(30);
            }
            $report->save();
            
            foreach($request->file('photo') as $photo){
                $photo_filename = $photo->store('public/images/reports');

                ReportImage::create([
                    'report_id' => $report->id,
                    'image' => $photo_filename,
                ]);
            }

            $user = auth()->guard('web')->user();

            $admins = Admin::all();

            Notification::send($admins, new ReportNotification($user, $report));

            event(new SendReport($user->username));
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
            'ctc' => ['nullable', 'string', 'max:255'],
            'issued_at' => ['nullable', 'string', 'max:255'],
            'issued_on' => ['nullable', 'date'],
        ]);

        $document = Document::find($id);

        if($request->hasFile('proof')){
            Storage::delete($document->bizClearance->proof);
            $proof_filename = $request->proof->store('public/images/clearances/business/proofs');
            $document->bizClearance->proof = $proof_filename;
        }

        if($request->hasFile('ctc_image') && !is_null($request->ctc) && !is_null($request->issued_at) && !is_null($request->issued_on) && is_null($document->bizClearance->ctc_photo)){

            $ctc_filename = $request->ctc_image->store('public/images/clearances/business/ctc');
            $document->bizClearance->ctc_photo = $ctc_filename;

            $document->bizClearance->ctc = $request->ctc;
            $document->bizClearance->issued_at = $request->issued_at;
            $document->bizClearance->issued_on = $request->issued_on;
        }else if($request->hasFile('ctc_image') && !is_null($document->bizClearance->ctc_photo) && !is_null($request->ctc) && !is_null($request->issued_at) && !is_null($request->issued_on)){
            Storage::delete($document->bizClearance->ctc_photo);

            $ctc_filename = $request->ctc_image->store('public/images/clearances/business/ctc');
            $document->bizClearance->ctc_photo = $ctc_filename;

            $document->bizClearance->ctc = $request->ctc;
            $document->bizClearance->issued_at = $request->issued_at;
            $document->bizClearance->issued_on = $request->issued_on;
        }else if(!$request->hasFile('ctc_image') && !is_null($document->bizClearance->ctc_photo) && !is_null($request->ctc) && !is_null($request->issued_at) && !is_null($request->issued_on)){
            $document->bizClearance->ctc = $request->ctc;
            $document->bizClearance->issued_at = $request->issued_at;
            $document->bizClearance->issued_on = $request->issued_on;
        }

        $document->bizClearance->biz_nature = $request->business_nature;
        $document->bizClearance->biz_owner = $request->owner_name;
        $document->bizClearance->biz_name = $request->business_name;
        $document->bizClearance->owner_address = $request->owner_address;
        $document->bizClearance->biz_address = $request->business_address;
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
            'ctc' => ['nullable', 'string', 'max:255'],
            'issued_at' => ['nullable', 'string', 'max:255'],
            'issued_on' => ['nullable', 'date'],
        ]);

        $document = Document::find($id);

        if($request->hasFile('ctc_image') && !is_null($request->ctc) && !is_null($request->issued_at) && !is_null($request->issued_on) && is_null($document->brgyClearance->ctc_photo)){

            $ctc_filename = $request->ctc_image->store('public/images/clearances/barangay');
            $document->brgyClearance->ctc_photo = $ctc_filename;

            $document->brgyClearance->ctc = $request->ctc;
            $document->brgyClearance->issued_at = $request->issued_at;
            $document->brgyClearance->issued_on = $request->issued_on;
        }else if($request->hasFile('ctc_image') && !is_null($document->brgyClearance->ctc_photo) && !is_null($request->ctc) && !is_null($request->issued_at) && !is_null($request->issued_on)){
            Storage::delete($document->brgyClearance->ctc_photo);

            $ctc_filename = $request->ctc_image->store('public/images/clearances/barangay');
            $document->brgyClearance->ctc_photo = $ctc_filename;

            $document->brgyClearance->ctc = $request->ctc;
            $document->brgyClearance->issued_at = $request->issued_at;
            $document->brgyClearance->issued_on = $request->issued_on;
        }else if(!$request->hasFile('ctc_image') && !is_null($document->brgyClearance->ctc_photo) && !is_null($request->ctc) && !is_null($request->issued_at) && !is_null($request->issued_on)){
            $document->brgyClearance->ctc = $request->ctc;
            $document->brgyClearance->issued_at = $request->issued_at;
            $document->brgyClearance->issued_on = $request->issued_on;
        }
        
        $document->brgyClearance->name = $request->name;
        $document->brgyClearance->zone = $request->zone;
        $document->brgyClearance->purpose = $request->purpose;
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
            'ctc_image' => ['nullable', File::image()],
            'ctc' => ['nullable', 'string', 'max:255'],
            'issued_at' => ['nullable', 'string', 'max:255'],
            'issued_on' => ['nullable', 'date'],
        ]);

        if(Auth::guard('web')->check()){
            $proof_filename = $request->proof->store('public/images/clearances/business/proofs');
            $token = uniqid(Str::random(10), true);
            
            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Business Clearance';
            $document->token = $token;
            $document->save();
            
            $bizClearance = new BusinessClearance();

            if($request->hasFile('ctc_image') && !is_null($request->ctc) && !is_null($request->issued_at) && !is_null($request->issued_on)){
                $ctc_filename = $request->ctc_image->store('public/images/clearances/business/ctc');
                $bizClearance->ctc_photo = $ctc_filename;

                $bizClearance->ctc = $request->ctc;
                $bizClearance->issued_at = $request->issued_at;
                $bizClearance->issued_on = $request->issued_on;
            }
            
            $bizClearance->document_id = $document->id;
            $bizClearance->biz_name = $request->business_name;
            $bizClearance->biz_address = $request->business_address;
            $bizClearance->biz_nature = $request->business_nature;
            $bizClearance->biz_owner = $request->owner_name;
            $bizClearance->owner_address = $request->owner_address;
            $bizClearance->proof = $proof_filename;
            $bizClearance->save();

            $user = auth()->guard('web')->user();
            $admins = Admin::all();

            Notification::send($admins, new DocumentNotification($user, $document));

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

            $user = auth()->guard('web')->user();
            $admins = Admin::all();

            Notification::send($admins, new DocumentNotification($user, $document));

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
            'ctc_image' => ['nullable', File::image()],
            'ctc' => ['nullable', 'string', 'max:255'],
            'issued_at' => ['nullable', 'string', 'max:255'],
            'issued_on' => ['nullable', 'date'],
        ]);

        if(Auth::guard('web')->check()){
            $token = uniqid(Str::random(10), true);
            
            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Barangay Clearance';
            $document->token = $token;
            $document->save();
            
            $brgyClearance = new BarangayClearance();

            if($request->hasFile('ctc_image') && !is_null($request->ctc) && !is_null($request->issued_at) && !is_null($request->issued_on)){
                $ctc_filename = $request->ctc_image->store('public/images/clearances/barangay');
                $brgyClearance->ctc_photo = $ctc_filename;
                
                $brgyClearance->ctc = $request->ctc;
                $brgyClearance->issued_at = $request->issued_at;
                $brgyClearance->issued_on = $request->issued_on;
            }
            
            $brgyClearance->document_id = $document->id;
            $brgyClearance->name = $request->name;
            $brgyClearance->zone = $request->zone;
            $brgyClearance->purpose = $request->purpose;
            $brgyClearance->save();

            $user = auth()->guard('web')->user();
            $admins = Admin::all();

            Notification::send($admins, new DocumentNotification($user, $document));

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

        $places = Place::all();

        return view('resident.resident-home', [
            'jobs' => $jobs,
            'places' => $places,
        ]);
    }

    public function place(Place $place)
    {
        return view('resident.resident-place', ['place' => $place]);
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
