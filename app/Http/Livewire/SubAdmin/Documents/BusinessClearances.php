<?php

namespace App\Http\Livewire\SubAdmin\Documents;

use App\Models\BusinessClearance;
use App\Models\Document;
use App\Models\DocumentPrice;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Wife;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class BusinessClearances extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $history_paginate = 5;
    public $history_paginate_values = [5, 10, 50, 100];
    
    public $search = '';

    public $history_search = '';
    
    protected $listeners = ['getDocDetails'];

    public $business_nature, $owner_name, $business_name, $business_address, $owner_address, $date_requested;

    public $proof;

    public $ctc_image, $ctc, $issued_at, $issued_on;

    public $ctc_update, $issued_on_update, $issued_at_update, $fee, $clearance_no_update;

    public $clearance_no;

    public $doc_id;

    public $ctc_container = 'd-none';

    public $error_msg = '';

    protected $messages = [
        'ctc_update' => [
            'required' => 'The ctc field is required.',
            'string' => 'The ctc field must be a string type.',
            'max' => 'The ctc field must not exceed 255 characters.',
        ],
        'issued_at_update' => [
            'required' => 'The issued at field is required.',
            'string' => 'The issued at field must be a string type.',
            'max' => 'The issued at field must not exceed 255 characters.',
        ],
        'issued_on_update' => [
            'required' => 'The issued on field is required.',
            'date' => 'The issued on field must be a valid date.',
        ],
        'clearance_no_update' => [
            'required' => 'The clearance no field is required.',
            'string' => 'The clearance no field must be a string type.',
            'max' => 'The clearance no field must not exceed 255 characters.',
        ],
    ];

    public function updatingSearch()
    {
        $this->resetPage('clearance');
        $this->resetPage('history');
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(
            'owner_address', 
            'date_requested', 
            'doc_id',
            'error_msg',
            'business_nature',
            'owner_name',
            'business_name',
            'business_address',
            'proof',
            'ctc_image',
            'ctc',
            'issued_at',
            'issued_on',
            'clearance_no',
            'ctc_update',
            'issued_at_update',
            'issued_on_update',
            'fee',
            'clearance_no_update',
            'ctc_container'
        );
    }

    public function getDocDetails($decodedText)
    {
        if(json_decode($decodedText) !== null){
            $qrcode = json_decode($decodedText);
            if(property_exists($qrcode, 'id') && property_exists($qrcode, 'token')){
                $document = Document::where('id', $qrcode->id)
                    ->where('token', $qrcode->token)
                    ->first();
    
                if(!is_null($document) && $document->is_released == false && $document->type === 'Business Clearance'){
                    $this->doc_id = $document->id;
                    $this->clearance_no = $document->bizClearance->clearance_no;
                    $this->business_name = $document->bizClearance->biz_name;
                    $this->business_address = $document->bizClearance->biz_address;
                    $this->business_nature = $document->bizClearance->biz_nature;
                    $this->owner_name = $document->bizClearance->biz_owner;
                    $this->owner_address = $document->bizClearance->owner_address;
                    $this->proof = $document->bizClearance->proof;
                    $this->ctc_image = $document->bizClearance->ctc_photo;
                    $this->ctc = $document->bizClearance->ctc;
                    $this->issued_at = $document->bizClearance->issued_at;
                    $this->issued_on = $document->bizClearance->issued_on;
                    $this->fee = $document->bizClearance->fee;
                    $this->date_requested = $document->created_at;
                }else if(!is_null($document) && $document->is_released == true && $document->type === 'Business Clearance'){
                    $this->error_msg = 'Document already claimed!';
                }else{
                    $this->error_msg = 'Not found!';
                }
            }else{
                $this->error_msg = 'Invalid Qr Code!';
            }
        }else{
            $this->error_msg = 'Invalid Qr Code!';
        }
    }

    public function qrReleaseConfirm()
    {
        $price = DocumentPrice::first();
        $this->fee = $price->biz_clearance;
        
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('showReleaseConfirm');
    }

    public function print()
    {
        $document = Document::find($this->doc_id);

        if(is_null($document->bizClearance->clearance_no)){
            $this->validate([
                'clearance_no_update' => ['required', 'string', 'max:255'],
            ]);

            $document->bizClearance->clearance_no = $this->clearance_no_update;
            $document->bizClearance->update();
        }

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();

        return redirect()->route('sub-admin.templates.biz-clearance', ['document' => $document]);
    }

    public function addCtc()
    {
        if($this->ctc_container === 'd-none'){
            $this->ctc_container = '';
        }else{
            $this->ctc_container = 'd-none';
            $this->reset('ctc', 'issued_at', 'issued_on');
            $this->resetErrorBag(['ctc', 'issued_at', 'issued_on']);
        }
    }

    public function addDoc()
    {
        $this->dispatchBrowserEvent('hideSuggestions');

        if($this->ctc_container === ''){
            $this->validate([
                'clearance_no' => ['required', 'string', 'max:255'],
                'business_nature' => ['required', 'string', 'max:255'],
                'owner_name' => ['required', 'string', 'max:255'],
                'business_name' => ['required', 'string', 'max:255'],
                'owner_address' => ['required', 'string', 'max:255'],
                'business_address' => ['required', 'string', 'max:255'],
                'ctc' => ['required', 'string', 'max:255'],
                'issued_at' => ['required', 'string', 'max:255'],
                'issued_on' => ['required', 'date'],
            ]);
        }else{
            $this->validate([
                'clearance_no' => ['required', 'string', 'max:255'],
                'business_nature' => ['required', 'string', 'max:255'],
                'owner_name' => ['required', 'string', 'max:255'],
                'business_name' => ['required', 'string', 'max:255'],
                'owner_address' => ['required', 'string', 'max:255'],
                'business_address' => ['required', 'string', 'max:255'],
            ]);
        }

        $this->dispatchBrowserEvent('showConfirmation');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function confirmAddDoc()
    {
        $document = new Document();
        $document->type = 'Business Clearance';
        $document->token = uniqid(Str::random(10), true);
        $document->save();

        $bizClearance = new BusinessClearance();
        $bizClearance->document_id = $document->id;
        $bizClearance->clearance_no = $this->clearance_no;
        $bizClearance->biz_name = $this->business_name;
        $bizClearance->biz_address = $this->business_address;
        $bizClearance->biz_nature = $this->business_nature;
        $bizClearance->biz_owner = $this->owner_name;
        $bizClearance->owner_address = $this->owner_address;
        $bizClearance->ctc = $this->ctc;
        $bizClearance->issued_at = $this->issued_at;
        $bizClearance->issued_on = $this->issued_on;
        $bizClearance->save();

        $this->closeModal();
        $this->dispatchBrowserEvent('close-modal');

        return redirect()->route('sub-admin.templates.biz-clearance', ['document' => $document]);
    }

    public function view(Document $document)
    {
        $this->doc_id = $document->id;
        $this->clearance_no = $document->bizClearance->clearance_no;
        $this->business_name = $document->bizClearance->biz_name;
        $this->business_address = $document->bizClearance->biz_address;
        $this->business_nature = $document->bizClearance->biz_nature;
        $this->owner_name = $document->bizClearance->biz_owner;
        $this->owner_address = $document->bizClearance->owner_address;
        $this->proof = $document->bizClearance->proof;
        $this->ctc_image = $document->bizClearance->ctc_photo;
        $this->ctc = $document->bizClearance->ctc;
        $this->issued_at = $document->bizClearance->issued_at;
        $this->issued_on = $document->bizClearance->issued_on;
    }

    public function releaseConfirm(Document $document)
    {
        $price = DocumentPrice::first();
        $this->doc_id = $document->id;
        $this->fee = $price->biz_clearance;
    }

    public function release()
    {
        $this->validate([
            'fee' => ['required', 'numeric', 'min:0.01', 'max:1000'],
        ]);

        $document = Document::find($this->doc_id);
        $document->status = 'Released';
        $document->is_released = true;

        if(Auth::guard('admin')->check()){
            $document->issued_by = auth()->guard('admin')->user()->username;
        }else if(Auth::guard('sub-admin')->check()){
            $document->issued_by = auth()->guard('sub-admin')->user()->fname . ' ' . auth()->guard('sub-admin')->user()->lname;
        }

        $document->update();
        
        $document->bizClearance->fee = $this->fee;
        $document->bizClearance->date_issued = now();
        $document->bizClearance->expiry_date = now()->addMonths(6);
        $document->bizClearance->update();
        
        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Document successfully released']);
    }

    public function getResidentName($name)
    {
        $this->owner_name = $name;
        $this->dispatchBrowserEvent('hideSuggestions');
    }
    
    public function render()
    {
        $documents = Document::with(['user', 'business', 'bizClearance'])
            ->where('type', 'Business Clearance')
            ->where('is_released', false)
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereHas('user', function ($query) {
                        $query->where('fname', 'like', '%' . $this->search . '%')
                            ->orWhere('lname', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('business', function ($query) {
                        $query->where('fname', 'like', '%' . $this->search . '%')
                            ->orWhere('lname', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('bizClearance', function ($query) {
                        $query->where('biz_name', 'like', '%' . $this->search . '%')
                            ->orWhere('biz_address', 'like', '%' . $this->search . '%')
                            ->orWhere('biz_owner', 'like', '%' . $this->search . '%')
                            ->orWhere('owner_address', 'like', '%' . $this->search . '%')
                            ->orWhere('biz_nature', 'like', '%' . $this->search . '%');
                    });
                });
            })
            ->orderByRaw("CASE
                WHEN status = 'Pending' THEN 1
                WHEN status = 'Ready To Pickup' THEN 2
                ELSE 3
            END")
            ->orderBy('created_at', 'asc')
            ->paginate($this->paginate, ['*'], 'clearance');

        $taken_documents = Document::with(['user', 'business', 'bizClearance'])
            ->where('type', 'Business Clearance')
            ->where('is_released', true)
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereHas('user', function ($query) {
                        $query->where('fname', 'like', '%' . $this->history_search . '%')
                            ->orWhere('lname', 'like', '%' . $this->history_search . '%');
                    })
                    ->orWhereHas('business', function ($query) {
                        $query->where('fname', 'like', '%' . $this->history_search . '%')
                            ->orWhere('lname', 'like', '%' . $this->history_search . '%');
                    })
                    ->orWhereHas('bizClearance', function ($query) {
                        $query->where('biz_name', 'like', '%' . $this->search . '%')
                            ->orWhere('biz_address', 'like', '%' . $this->search . '%')
                            ->orWhere('biz_owner', 'like', '%' . $this->search . '%')
                            ->orWhere('owner_address', 'like', '%' . $this->search . '%')
                            ->orWhere('biz_nature', 'like', '%' . $this->search . '%');
                    });
                });
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->history_paginate, ['*'], 'history');

        
        $results = [];

        if(strlen($this->owner_name) >= 1){
            $results['heads'] = FamilyHead::select('fullname')->where('fullname', 'like', '%' . $this->owner_name . '%')->take(10)->get();
            $results['wives'] = Wife::select('fullname')->where('fullname', 'like', '%' . $this->owner_name . '%')->take(10)->get();
            $results['members'] = FamilyMember::select('fullname')->where('fullname', 'like', '%' . $this->owner_name . '%')->take(10)->get();
        }

        $total_fee = BusinessClearance::whereDate('date_issued', today())->sum('fee');

        return view('livewire.sub-admin.documents.business-clearances', [
            'documents' => $documents,
            'taken_documents' => $taken_documents,
            'results' => $results,
            'total_fee' => $total_fee,
        ]);
    }
}
