<?php

namespace App\Http\Controllers\Users;

use App\Events\SendReport;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Assistance;
use App\Models\BarangayClearance;
use App\Models\BusinessClearance;
use App\Models\EmergencyHotline;
use App\Models\Indigency;
use App\Models\Job;
use App\Models\Place;
use App\Models\Report;
use App\Models\ReportImage;
use App\Models\SubAdmin;
use App\Notifications\AssistanceNotification;
use App\Notifications\DocumentNotification;
use App\Notifications\ReportNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Notification;

class ResidentController extends Controller
{
    public function deleteAssist($id)
    {
        Assistance::find($id)->delete();

        return redirect()->route('resident.services')->with('success', 'Request canceled successfully');
    }

    public function updateAssist(Request $request, Assistance $assistance)
    {
        if($request->need === 'Others'){
            $request->validate([
                'date' => ['required', 'date'],
                'time' => ['nullable', 'date_format:H:i'],
                'need' => ['required', 'string', 'max:255'],
                'others' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:1000'],
            ]);
        }else{
            $request->validate([
                'date' => ['required', 'date'],
                'time' => ['nullable', 'date_format:H:i'],
                'need' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:1000'],
            ]);
        }

        $assistance->need = $request->need === 'Others' ? $request->others : $request->need;
        $assistance->purpose = $request->purpose;
        $assistance->date = $request->date;
        $assistance->time = $request->time;
        $assistance->update();

        return redirect()->route('resident.services')->with('success', 'Request updated successfully');
    }

    public function assistance(Assistance $assistance)
    {
        if(auth()->guard('web')->id() != $assistance->user_id){
            return abort(404);
        }
        
        if($assistance->status === 'Pending'){
            return view('resident.assistance.edit-assistance', ['assistance' => $assistance]);
        }else if($assistance->status === 'Approved' || $assistance->status === 'Done' || $assistance->status === 'Declined'){
            return view('resident.assistance.view-assistance', ['assistance' => $assistance]);
        }else{
            abort(404);
        }
    }

    public function requestAssistance(Request $request)
    {
        if($request->need === 'Others'){
            $request->validate([
                'date' => ['required', 'date'],
                'time' => ['nullable', 'date_format:H:i'],
                'need' => ['required', 'string', 'max:255'],
                'others' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:1000'],
            ]);
        }else{
            $request->validate([
                'date' => ['required', 'date'],
                'time' => ['nullable', 'date_format:H:i'],
                'need' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:1000'],
            ]);
        }
        
        $assistance = Assistance::create([
            'user_id' => auth()->guard('web')->id(),
            'need' => $request->need === 'Others' ? $request->others : $request->need,
            'purpose' => $request->purpose,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        $user = auth()->guard('web')->user();
        $admins = Admin::all();
        $subAdmins = SubAdmin::where('position', 'Barangay Official')->get();

        Notification::send($admins, new AssistanceNotification($user, $assistance));
        Notification::send($subAdmins, new AssistanceNotification($user, $assistance));

        return redirect()->route('resident.services')->with('success', 'Request successfully sent');
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
                    ],
                    'photo' => [
                        'max' => 'The photo field must not exceed 3 image.'
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
                    ],
                    'photo' => [
                        'max' => 'The photo field must not exceed 3 image.'
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

        return redirect()->route('resident.services')->with('success', 'Report updated successfully');
    }

    public function viewReport(Report $report)
    {
        $hotlines = EmergencyHotline::first();

        if(Auth::guard('web')->check() && $report->user_id == auth()->guard('web')->id()){
            return view('resident.reports.view-report', [
                'report' => $report,
                'hotlines' => $hotlines,
            ]);
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
                    ],
                    'photo' => [
                        'max' => 'The photo field must not exceed 3 image.'
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
                    ],
                    'photo' => [
                        'max' => 'The photo field must not exceed 3 image.'
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
            $subAdmins = SubAdmin::where('position', 'Barangay Official')->get();

            Notification::send($admins, new ReportNotification($user, $report));
            Notification::send($subAdmins, new ReportNotification($user, $report));

            event(new SendReport($user->username));
        }

        return redirect()->route('resident.services')->with('success', 'Report successfully sent');
    }

    public function addReport()
    {
        $hotlines = EmergencyHotline::first();

        return view('resident.reports.add-report', ['hotlines' => $hotlines]);
    }

    public function updateIndigency(Request $request, $id)
    {
        if($request->purpose === 'Others'){
            $request->validate([
                // 'name' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:255'],
                'others' => ['required', 'string', 'max:255'],
            ]);
        }else{
            $request->validate([
                // 'name' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:255'],
            ]);
        }

        $document = Document::find($id);
        // $document->indigency->name = $request->name;
        $document->indigency->purpose = $request->purpose === 'Others' ? $request->others : $request->purpose;
        $document->indigency->update();

        return redirect()->route('resident.services')->with('success', 'Document updated successfully');
    }

    public function updateBizClearance(Request $request, $id){
        $request->validate([
            'business_nature' => ['required', 'string', 'max:255'],
            // 'owner_name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            // 'owner_address' => ['required', 'string', 'max:255'],
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
        // $document->bizClearance->biz_owner = $request->owner_name;
        $document->bizClearance->biz_name = $request->business_name;
        // $document->bizClearance->owner_address = $request->owner_address;
        $document->bizClearance->biz_address = $request->business_address;
        $document->bizClearance->update();

        return redirect()->route('resident.services')->with('success', 'Document updated successfully');
    }

    public function updateBrgyClearance(Request $request, $id)
    {
        if($request->purpose === 'Others'){
            $request->validate([
                // 'name' => ['required', 'string', 'max:255'],
                // 'zone' => ['required', 'string', 'max:1'],
                'purpose' => ['required', 'string', 'max:255'],
                'others' => ['required', 'string', 'max:255'],
                'ctc_image' => [File::image()],
                'ctc' => ['nullable', 'string', 'max:255'],
                'issued_at' => ['nullable', 'string', 'max:255'],
                'issued_on' => ['nullable', 'date'],
            ]);
        }else{
            $request->validate([
                // 'name' => ['required', 'string', 'max:255'],
                // 'zone' => ['required', 'string', 'max:1'],
                'purpose' => ['required', 'string', 'max:255'],
                'ctc_image' => [File::image()],
                'ctc' => ['nullable', 'string', 'max:255'],
                'issued_at' => ['nullable', 'string', 'max:255'],
                'issued_on' => ['nullable', 'date'],
            ]);
        }

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
        
        // $document->brgyClearance->name = $request->name;
        // $document->brgyClearance->zone = $request->zone;
        $document->brgyClearance->purpose = $request->purpose === 'Others' ? $request->others : $request->purpose;
        $document->brgyClearance->update();


        return redirect()->route('resident.services')->with('success', 'Document updated successfully');
    }

    public function viewDocs($id)
    {
        $document = Document::with(['brgyClearance', 'bizClearance', 'indigency'])->find($id);

        if(!is_null($document) && $document->user_id == auth()->guard('web')->id()){
            if($document->type === 'Barangay Clearance'){
                return view('resident.documents.view-documents.brgy-clearance', ['document' => $document]);
            }else if($document->type === 'Business Clearance'){
                return view('resident.documents.view-documents.business-clearance', ['document' => $document]);
            }else if($document->type === 'Indigency'){
                return view('resident.documents.view-documents.indigency', ['document' => $document]);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
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
            // 'owner_name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            // 'owner_address' => ['required', 'string', 'max:255'],
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
            
            $user = auth()->guard('web')->user();

            $bizClearance->document_id = $document->id;
            $bizClearance->biz_name = $request->business_name;
            $bizClearance->biz_address = $request->business_address;
            $bizClearance->biz_nature = $request->business_nature;
            $bizClearance->biz_owner = $user->fname . ' ' . (is_null($user->mname) ? '' : $user->mname[0] . '. ') . $user->lname . (is_null($user->sname) ? '' : ' ' . $user->sname);
            $bizClearance->owner_address = 'Zone ' . $user->zone . ', Nancayasan Urdaneta City, Pangasinan';
            $bizClearance->proof = $proof_filename;
            $bizClearance->save();

            $user = auth()->guard('web')->user();
            $admins = Admin::all();
            $subAdmins = SubAdmin::where('position', 'Barangay Official')->get();

            Notification::send($admins, new DocumentNotification($user, $document));
            Notification::send($subAdmins, new DocumentNotification($user, $document));

            return redirect()->route('resident.qr-code', ['token' => $token])->with('success', 'Request successfully sent');
        }else{
            return redirect()->route('resident.biz-clearance');
        }
    }

    public function storeIndigency(Request $request)
    {
        if($request->purpose === 'Others'){
            $request->validate([
                // 'name' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:255'],
                'others' => ['required', 'string', 'max:255'],
            ]);
        }else{
            $request->validate([
                // 'name' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:255'],
            ]);
        }

        if(Auth::guard('web')->check()){
            $token = uniqid(Str::random(10), true);

            $document = new Document();
            $document->user_id = auth()->guard('web')->id();
            $document->type = 'Indigency';
            $document->token = $token;
            $document->save();

            $user = auth()->guard('web')->user();

            $indigency = new Indigency();
            $indigency->document_id = $document->id;
            $indigency->name = $user->fname . ' ' . (is_null($user->mname) ? '' : $user->mname[0] . '. ') . $user->lname . (is_null($user->sname) ? '' : ' ' . $user->sname);
            $indigency->purpose = $request->purpose === 'Others' ? $request->others : $request->purpose;
            $indigency->save();

            $user = auth()->guard('web')->user();
            $admins = Admin::all();
            $subAdmins = SubAdmin::where('position', 'Barangay Official')->get();

            Notification::send($admins, new DocumentNotification($user, $document));
            Notification::send($subAdmins, new DocumentNotification($user, $document));

            return redirect()->route('resident.qr-code', ['token' => $token])->with('success', 'Request successfully sent');
        }else{
            return redirect()->route('resident.indigency');
        }
    }

    public function storeBrgyClearance(Request $request)
    {
        if($request->purpose === 'Others'){
            $request->validate([
                // 'name' => ['required', 'string', 'max:255'],
                // 'zone' => ['required', 'string', 'max:1'],
                'purpose' => ['required', 'string', 'max:255'],
                'others' => ['required', 'string', 'max:255'],
                'ctc_image' => ['nullable', File::image()],
                'ctc' => ['nullable', 'string', 'max:255'],
                'issued_at' => ['nullable', 'string', 'max:255'],
                'issued_on' => ['nullable', 'date'],
            ]);
        }else{
            $request->validate([
                // 'name' => ['required', 'string', 'max:255'],
                // 'zone' => ['required', 'string', 'max:1'],
                'purpose' => ['required', 'string', 'max:255'],
                'ctc_image' => ['nullable', File::image()],
                'ctc' => ['nullable', 'string', 'max:255'],
                'issued_at' => ['nullable', 'string', 'max:255'],
                'issued_on' => ['nullable', 'date'],
            ]);
        }

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

            $user = auth()->guard('web')->user();
            
            $brgyClearance->document_id = $document->id;
            $brgyClearance->name = $user->fname . ' ' . (is_null($user->mname) ? '' : $user->mname[0] . '. ') . $user->lname . (is_null($user->sname) ? '' : ' ' . $user->sname);
            $brgyClearance->zone = $user->zone;
            $brgyClearance->purpose = $request->purpose === 'Others' ? $request->others : $request->purpose;
            $brgyClearance->save();

            $user = auth()->guard('web')->user();
            $admins = Admin::all();
            $subAdmins = SubAdmin::where('position', 'Barangay Official')->get();

            Notification::send($admins, new DocumentNotification($user, $document));
            Notification::send($subAdmins, new DocumentNotification($user, $document));

            return redirect()->route('resident.qr-code', ['token' => $token])->with('success', 'Request successfully sent');
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

        $places = Place::where('is_approved', true)->get();

        return view('resident.resident-home', [
            'jobs' => $jobs,
            'places' => $places,
        ]);
    }

    public function placeCategory(Request $request)
    {
        $jobs = Job::with('business')->where('done_hiring', false)->inRandomOrder()->take(10)->get();

        $places = null;
        if($request->category === 'Others'){
            $places = Place::where('is_approved', true)
            ->where('type', '!=', 'Mall')
            ->where('type', '!=', 'Restaurant')
            ->where('type', '!=', 'Store')
            ->where('type', '!=', 'Car Wash')
            ->where('type', '!=', 'Repair Shop')
            ->where('type', '!=', 'Junk Shop')
            ->where('type', '!=', 'Pharmacies')
            ->get();
        }else{
            $places = Place::where('is_approved', true)
            ->where('type', $request->category)
            ->get();
        }

        return view('resident.resident-home', [
            'jobs' => $jobs,
            'places' => $places,
            'category' => $request->category,
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
