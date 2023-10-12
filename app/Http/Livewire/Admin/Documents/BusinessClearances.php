<?php

namespace App\Http\Livewire\Admin\Documents;

use App\Models\BusinessClearance;
use App\Models\Wife;
use Livewire\Component;
use App\Models\Document;
use App\Models\FamilyHead;
use Illuminate\Support\Str;
use App\Models\FamilyMember;
use Livewire\WithPagination;
use App\Rules\CheckIfValidResident;

class BusinessClearances extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $history_paginate = 5;
    
    public $search = '';

    public $history_search = '';
    
    protected $listeners = ['getDocDetails'];

    public $business_nature, $owner_name, $business_name, $business_address, $owner_address, $date_requested;

    public $proof;

    public $ctc_image, $ctc, $issued_at, $issued_on;

    public $clearance_no;

    public $doc_id;

    public $error_msg = '';

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
                    $this->business_name = $document->bizClearance->biz_name;
                    $this->business_address = $document->bizClearance->biz_address;
                    $this->business_nature = $document->bizClearance->biz_nature;
                    $this->owner_name = $document->bizClearance->biz_owner;
                    $this->owner_address = $document->bizClearance->owner_address;
                    $this->ctc = $document->bizClearance->ctc;
                    $this->issued_at = $document->bizClearance->issued_at;
                    $this->issued_on = $document->bizClearance->issued_on;
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

    public function markAsUsed()
    {
        $document = Document::find($this->doc_id);
        $document->status = 'Released';
        $document->is_released = true;
        $document->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function addDoc()
    {
        $this->dispatchBrowserEvent('hideSuggestions');

        $this->validate([
            'clearance_no' => ['required', 'string', 'max:255'],
            'business_nature' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255', new CheckIfValidResident],
            'business_name' => ['required', 'string', 'max:255'],
            'owner_address' => ['required', 'string', 'max:255'],
            'business_address' => ['required', 'string', 'max:255'],
            'ctc' => ['required', 'string', 'max:255'],
            'issued_at' => ['required', 'string', 'max:255'],
            'issued_on' => ['required', 'date'],
        ]);

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

        $this->dispatchBrowserEvent('toPrint', ['id' => $document->id]);
    }

    public function view(Document $document)
    {
        $this->doc_id = $document->id;
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
        $this->date_requested = $document->created_at;
    }

    public function print()
    {
        $document = Document::find($this->doc_id);
        
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('toPrint', ['id' => $document->id]);
        $this->closeModal();
    }

    public function editDoc(Document $document)
    {
        $this->doc_id = $document->id;
    }

    public function release()
    {
        $document = Document::find($this->doc_id);
        $document->status = 'Released';
        $document->is_released = true;
        $document->bizClearance->date_issued = now();
        $document->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
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
            ->orderBy('created_at', 'desc')
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


        return view('livewire.admin.documents.business-clearances', [
            'documents' => $documents,
            'taken_documents' => $taken_documents,
            'results' => $results,
        ]);
    }
}
