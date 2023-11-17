<?php

namespace App\Http\Controllers\Users;

use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BusinessClearance;
use App\Notifications\DocumentNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BusinessController extends Controller
{
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

        return redirect()->route('business.services')->with('success', 'Document updated successfully');
    }

    public function editDocs($id, $token)
    {
        $document = Document::with(['brgyClearance', 'bizClearance', 'indigency'])
            ->where('id', $id)
            ->where('token', $token)
            ->first();

        if(!is_null($document) && $document->user_id == auth()->guard('web')->id()){
            return view('business.business-clearance', ['document' => $document]);
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
    
            return view('business.business-qr-code', ['qr_code' => $qr_code]);
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

        if(Auth::guard('business')->check()){
            $proof_filename = $request->proof->store('public/images/clearances/business/proofs');
            $token = uniqid(Str::random(10), true);
            
            $document = new Document();
            $document->business_id = auth()->guard('business')->id();
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

            $user = auth()->guard('business')->user();
            $admins = Admin::all();

            Notification::send($admins, new DocumentNotification($user, $document));

            return redirect()->route('business.qr-code', ['token' => $token])->with('success', 'Request successfully sent');
        }else{
            return redirect()->route('business.biz-clearance');
        }
    }

    public function showRegisterForm()
    {
        return view('auth.users.register-company');
    }

    public function home()
    {
        return view('business.business-home');
    }
}
