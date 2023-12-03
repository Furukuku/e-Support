<?php

namespace App\Http\Livewire\SubAdmin\Documents;

use App\Models\Document;
use App\Models\FamilyHead;
use App\Models\FamilyMember;
use App\Models\Indigency;
use App\Models\Wife;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Indigencies extends Component
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

    public $name, $purpose, $others, $date_requested;

    public $doc_id;

    public $category = 0;

    public $reason, $other;

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
            'name',
            'purpose',
            'others',
            'date_requested',
            'doc_id',
            'error_msg',
            'reason',
            'other'
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
    
                if(!is_null($document) && $document->is_released == false && $document->type === 'Indigency'){
                    $this->doc_id = $document->id;
                    $this->name = $document->indigency->name;
                    $this->purpose = $document->indigency->purpose;
                    $this->date_requested = $document->created_at;
                }else if(!is_null($document) && $document->is_released == true && $document->type === 'Indigency'){
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
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('showReleaseConfirm');
    }

    public function print()
    {
        $document = Document::find($this->doc_id);

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();

        return redirect()->route('sub-admin.templates.indigency', ['document' => $document]);
    }

    public function addDoc()
    {
        $this->dispatchBrowserEvent('hideSuggestions');

        if($this->purpose === 'Others'){
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:30'],
                'others' => ['required', 'string', 'max:100'],
            ]);
        }else{
            $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'purpose' => ['required', 'string', 'max:30'],
            ]);
        }

        $this->dispatchBrowserEvent('showConfirmation');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function confirmAddDoc()
    {
        $document = new Document();
        $document->type = 'Indigency';
        $document->token = uniqid(Str::random(10), true);
        $document->save();
        
        $indigency = new Indigency();
        $indigency->document_id = $document->id;
        $indigency->name = $this->name;
        $indigency->purpose = $this->purpose === 'Others' ? $this->others : $this->purpose;
        $indigency->save();

        $this->closeModal();
        $this->dispatchBrowserEvent('close-modal');

        return redirect()->route('sub-admin.templates.indigency', ['document' => $document]);
    }

    public function view(Document $document)
    {
        $this->doc_id = $document->id;
        $this->name = $document->indigency->name;
        $this->purpose = $document->indigency->purpose;
    }

    public function releaseConfirm(Document $document)
    {
        $this->doc_id = $document->id;
    }

    public function release()
    {
        $document = Document::find($this->doc_id);
        $document->status = 'Released';
        $document->is_released = true;

        if(Auth::guard('admin')->check()){
            $document->issued_by = auth()->guard('admin')->user()->username;
        }else if(Auth::guard('sub-admin')->check()){
            $document->issued_by = auth()->guard('sub-admin')->user()->fname . ' ' . auth()->guard('sub-admin')->user()->lname;
        }

        $document->update();

        $document->indigency->date_issued = now();
        $document->indigency->update();

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
        $documents = Document::with(['user', 'indigency'])
            ->where('type', 'Indigency')
            ->where('is_released', false)
            ->where('status', '!=', 'Declined')
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereHas('user', function ($query) {
                        $query->where('fname', 'like', '%' . $this->search . '%')
                            ->orWhere('lname', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('indigency', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
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

        $taken_documents = Document::with(['user', 'indigency'])
            ->where('type', 'Indigency')
            ->where('is_released', true)
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->whereHas('user', function ($query) {
                        $query->where('fname', 'like', '%' . $this->history_search . '%')
                            ->orWhere('lname', 'like', '%' . $this->history_search . '%');
                    })
                    ->orWhereHas('indigency', function ($query) {
                        $query->where('name', 'like', '%' . $this->history_search . '%')
                            ->orWhere('purpose', 'like', '%' . $this->history_search . '%');
                    });
                });
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->history_paginate, ['*'], 'history');

            $results = [];

            if(strlen($this->name) >= 1){
                $results['heads'] = FamilyHead::select('fullname')->where('fullname', 'like', '%' . $this->name . '%')->get();
                $results['wives'] = Wife::select('fullname')->where('fullname', 'like', '%' . $this->name . '%')->get();
                $results['members'] = FamilyMember::select('fullname')->where('fullname', 'like', '%' . $this->name . '%')->get();
            }

        return view('livewire.sub-admin.documents.indigencies', [
            'documents' => $documents,
            'taken_documents' => $taken_documents,
            'results' => $results,
        ]);
    }
}
