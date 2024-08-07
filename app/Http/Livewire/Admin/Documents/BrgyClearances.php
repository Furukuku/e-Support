<?php

namespace App\Http\Livewire\Admin\Documents;

use App\Models\BarangayClearance;
use Livewire\Component;
use App\Models\Document;
use App\Models\DocumentPrice;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Wife;
use App\Rules\CheckIfValidResident;
use App\Rules\DateInterval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BrgyClearances extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $history_paginate = 5;
    public $history_paginate_values = [5, 10, 50, 100];
    
    public $search = '';

    public $history_search = '';
    
    protected $listeners = ['getDocDetails'];

    public $name, $zone, $purpose, $others, $date_requested, $status;

    public $ctc_image, $ctc, $issued_at, $issued_on;

    public $ctc_update, $issued_on_update, $issued_at_update, $fee, $price;

    public $user_id, $business_id;

    public $doc_id;

    public $category = 0;

    public $reason, $other;

    // properties for generating report
    public $from, $to, $prepared_by;

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
        ]
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
            'name', 
            'zone', 
            'purpose', 
            'others',
            'date_requested',
            'status',
            'doc_id',
            'error_msg',
            'user_id',
            'business_id',
            'ctc_image',
            'ctc',
            'issued_at',
            'issued_on',
            'ctc_update',
            'issued_at_update',
            'issued_on_update',
            'fee',
            'ctc_container',
            'price',
            'from',
            'to',
            'prepared_by',
            'reason',
            'other'
        );
    }

    public function generateReport()
    {
        $this->validate([
            'from' => ['required', 'date'],
            'to' => ['required', 'date', new DateInterval($this->from)],
            'prepared_by' => ['required', 'string', 'max:255']
        ]);

        $this->dispatchBrowserEvent('close-modal');

        return redirect()->route('admin.generate-report.brgy-clearance', [
                'from' => $this->from,
                'to' => $this->to,
                'prepared_by' => $this->prepared_by
            ]);
    }

    public function getDocDetails($decodedText)
    {
        if(json_decode($decodedText) !== null){
            $qrcode = json_decode($decodedText);
            if(property_exists($qrcode, 'id') && property_exists($qrcode, 'token')){
                $document = Document::where('id', $qrcode->id)
                    ->where('token', $qrcode->token)
                    ->first();
    
                if(!is_null($document) && $document->is_released == false && $document->type === 'Barangay Clearance'){
                    $this->doc_id = $document->id;
                    $this->name = $document->brgyClearance->name;
                    $this->zone = $document->brgyClearance->zone;
                    $this->purpose = $document->brgyClearance->purpose;
                    $this->ctc_image = $document->brgyClearance->ctc_photo;
                    $this->ctc = $document->brgyClearance->ctc;
                    $this->issued_at = $document->brgyClearance->issued_at;
                    $this->issued_on = $document->brgyClearance->issued_on;
                    $this->fee = $document->brgyClearance->fee;
                    $this->date_requested = $document->created_at;
                }else if(!is_null($document) && $document->is_released == true && $document->type === 'Barangay Clearance'){
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
        $this->price = $price->brgy_clearance;

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('showReleaseConfirm');
    }

    public function print()
    {
        $document = Document::find($this->doc_id);

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();

        return redirect()->route('admin.templates.brgy-clearance', ['document' => $document]);
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
            if($this->purpose === 'Others'){
                $this->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'zone' => ['required', 'string', 'max:1'],
                    'purpose' => ['required', 'string', 'max:30'],
                    'others' => ['required', 'string', 'max:100'],
                    'ctc' => ['required', 'string', 'max:255'],
                    'issued_at' => ['required', 'string', 'max:255'],
                    'issued_on' => ['required', 'date'],
                ]);
            }else{
                $this->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'zone' => ['required', 'string', 'max:1'],
                    'purpose' => ['required', 'string', 'max:255'],
                    'ctc' => ['required', 'string', 'max:255'],
                    'issued_at' => ['required', 'string', 'max:255'],
                    'issued_on' => ['required', 'date'],
                ]);
            }
        }else{
            if($this->purpose === 'Others'){
                $this->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'zone' => ['required', 'string', 'max:1'],
                    'purpose' => ['required', 'string', 'max:30'],
                    'others' => ['required', 'string', 'max:100'],
                ]);
            }else{
                $this->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'zone' => ['required', 'string', 'max:1'],
                    'purpose' => ['required', 'string', 'max:30'],
                ]);
            }
        }

        $this->dispatchBrowserEvent('showConfirmation');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function confirmAddDoc()
    {
        $document = new Document();
        $document->type = 'Barangay Clearance';
        $document->token = uniqid(Str::random(10), true);
        $document->save();

        $brgyClearance = new BarangayClearance();
        $brgyClearance->document_id = $document->id;
        $brgyClearance->name = $this->name;
        $brgyClearance->zone = $this->zone;
        $brgyClearance->purpose = $this->purpose === 'Others' ? $this->others : $this->purpose;
        $brgyClearance->ctc = $this->ctc;
        $brgyClearance->issued_at = $this->issued_at;
        $brgyClearance->issued_on = $this->issued_on;
        $brgyClearance->save();

        $this->closeModal();
        $this->dispatchBrowserEvent('close-modal');

        return redirect()->route('admin.templates.brgy-clearance', ['document' => $document]);
    }

    public function view(Document $document)
    {
        $this->doc_id = $document->id;
        $this->name = $document->brgyClearance->name;
        $this->zone = $document->brgyClearance->zone;
        $this->purpose = $document->brgyClearance->purpose;
        $this->ctc_image = $document->brgyClearance->ctc_photo;
        $this->ctc = $document->brgyClearance->ctc;
        $this->issued_at = $document->brgyClearance->issued_at;
        $this->issued_on = $document->brgyClearance->issued_on;
    }

    public function releaseConfirm(Document $document)
    {
        $price = DocumentPrice::first();
        $this->doc_id = $document->id;
        $this->price = $price->brgy_clearance;
    }

    public function release()
    {
        $this->validate([
            'fee' => ['required', 'numeric', 'min:0', 'max:1000'],
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

        $document->brgyClearance->fee = $this->fee;
        $document->brgyClearance->date_issued = now();
        $document->brgyClearance->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Document successfully released']);
    }

    public function getResidentName($name)
    {
        $this->name = $name;
        $this->dispatchBrowserEvent('hideSuggestions');
    }

    public function declineConfirm(Document $document)
    {
        $this->doc_id = $document->id;
    }

    public function decline()
    {
        $document = Document::find($this->doc_id);

        if($this->reason === 'Other'){
            $this->validate([
                'other' => ['required', 'string', 'max:100']
            ]);

            $document->decline_msg = $this->other;
        }else{
            $this->validate([
                'reason' => ['required', 'string', 'max:100']
            ]);

            $document->decline_msg = $this->reason;
        }

        $document->status = 'Declined';
        $document->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Document declined successfully']);
    }
    
    public function render()
    {
        $documents = Document::with(['user', 'brgyClearance'])
            ->where('type', 'Barangay Clearance')
            ->where('is_released', false)
            ->where('status', '!=', 'Declined')
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereHas('user', function ($query) {
                        $query->where('fname', 'like', '%' . $this->search . '%')
                            ->orWhere('lname', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('brgyClearance', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('zone', 'like', '%' . $this->search . '%')
                            ->orWhere('purpose', 'like', '%' . $this->search . '%');
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

        $taken_documents = Document::with(['user', 'brgyClearance'])
            ->where('type', 'Barangay Clearance')
            ->where('is_released', true)
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereHas('user', function ($query) {
                        $query->where('fname', 'like', '%' . $this->history_search . '%')
                            ->orWhere('lname', 'like', '%' . $this->history_search . '%');
                    })
                    ->orWhereHas('brgyClearance', function ($query) {
                        $query->where('name', 'like', '%' . $this->history_search . '%')
                            ->orWhere('zone', 'like', '%' . $this->history_search . '%')
                            ->orWhere('purpose', 'like', '%' . $this->history_search . '%');
                    });
                });
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->history_paginate, ['*'], 'history');

        $results = [];

        if(strlen($this->name) >= 1){
            $results['heads'] = FamilyHead::select('fullname')->where('fullname', 'like', '%' . $this->name . '%')->take(10)->get();
            $results['wives'] = Wife::select('fullname')->where('fullname', 'like', '%' . $this->name . '%')->take(10)->get();
            $results['members'] = FamilyMember::select('fullname')->where('fullname', 'like', '%' . $this->name . '%')->take(10)->get();
        }

        $total_fee = BarangayClearance::whereDate('date_issued', today())->sum('fee');
        
        return view('livewire.admin.documents.brgy-clearances', [
            'documents' => $documents,
            'taken_documents' => $taken_documents,
            'results' => $results,
            'total_fee' => $total_fee,
        ]);
    }
}
