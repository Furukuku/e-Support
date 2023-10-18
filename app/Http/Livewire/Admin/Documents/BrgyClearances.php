<?php

namespace App\Http\Livewire\Admin\Documents;

use App\Models\BarangayClearance;
use Livewire\Component;
use App\Models\Document;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Wife;
use App\Rules\CheckIfValidResident;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BrgyClearances extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $history_paginate = 5;
    
    public $search = '';

    public $history_search = '';
    
    protected $listeners = ['getDocDetails'];

    public $name, $zone, $purpose, $date_requested, $status;

    public $ctc_image, $ctc, $issued_at, $issued_on;

    public $ctc_update, $issued_on_update, $issued_at_update, $fee;

    public $user_id, $business_id;

    public $doc_id;

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

    public function print()
    {
        $document = Document::find($this->doc_id);
        
        if(is_null($this->ctc) && is_null($this->issued_at) && is_null($this->issued_on)){
            $this->validate([
                'ctc_update' => ['required', 'string', 'max:255'],
                'issued_at_update' => ['required', 'string', 'max:255'],
                'issued_on_update' => ['required', 'date'],
                'fee' => ['required', 'numeric', 'min:0.01'],
            ]);
            
            $document->brgyClearance->ctc = $this->ctc_update;
            $document->brgyClearance->issued_at = $this->issued_at_update;
            $document->brgyClearance->issued_on = $this->issued_on_update;
            $document->brgyClearance->fee = $this->fee;
            $document->brgyClearance->update();
        }

        
        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();

        return redirect()->route('admin.templates.brgy-clearance', ['document' => $document]);
    }

    public function addDoc()
    {
        $this->dispatchBrowserEvent('hideSuggestions');

        $this->validate([
            'name' => ['required', 'string', 'max:255', new CheckIfValidResident],
            'zone' => ['required', 'string', 'max:1'],
            'purpose' => ['required', 'string', 'max:255'],
            'ctc' => ['required', 'string', 'max:255'],
            'issued_at' => ['required', 'string', 'max:255'],
            'issued_on' => ['required', 'date'],
            'fee' => ['required', 'numeric', 'min:0.01'],
        ]);

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
        $brgyClearance->purpose = $this->purpose;
        $brgyClearance->ctc = $this->ctc;
        $brgyClearance->issued_at = $this->issued_at;
        $brgyClearance->issued_on = $this->issued_on;
        $brgyClearance->fee = $this->fee;
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
        $this->fee = $document->brgyClearance->fee;
    }

    // public function print()
    // {
    //     $document = Document::find($this->doc_id);
        
    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->dispatchBrowserEvent('toPrint', ['id' => $document->id]);
    //     $this->closeModal();
    // }

    public function editDoc(Document $document)
    {
        $this->doc_id = $document->id;
    }

    public function release()
    {
        $document = Document::find($this->doc_id);
        $document->status = 'Released';
        $document->is_released = true;
        $document->brgyClearance->date_issued = now();
        $document->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function getResidentName($name)
    {
        $this->name = $name;
        $this->dispatchBrowserEvent('hideSuggestions');
    }
    
    public function render()
    {
        $documents = Document::with(['user', 'brgyClearance'])
            ->where('type', 'Barangay Clearance')
            ->where('is_released', false)
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
            ->orderBy('created_at', 'desc')
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
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('zone', 'like', '%' . $this->search . '%')
                            ->orWhere('purpose', 'like', '%' . $this->search . '%');
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
