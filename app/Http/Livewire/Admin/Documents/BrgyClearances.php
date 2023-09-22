<?php

namespace App\Http\Livewire\Admin\Documents;

use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class BrgyClearances extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $history_paginate = 5;
    
    public $search = '';

    public $history_search = '';
    
    protected $listeners = ['getDocDetails'];

    public $name, $zone, $purpose, $date_requested;

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
            'name', 
            'zone', 
            'purpose', 
            'date_requested',
            'doc_id',
            'error_msg',
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
    
                if($document !== null && $document->is_released == false && $document->type === 'Barangay Clearance'){
                    $this->doc_id = $document->id;
                    $this->name = $document->name;
                    $this->zone = $document->zone;
                    $this->purpose = $document->purpose;
                    $this->date_requested = $document->created_at;
                }else if($document !== null && $document->is_released == true && $document->type === 'Barangay Clearance'){
                    $this->error_msg = 'Qr Code Already Used!';
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
        $document->is_released = true;
        $document->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function addDoc()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'zone' => ['required', 'string', 'max:1'],
            'purpose' => ['required', 'string', 'max:255'],
        ]);

        Document::create([
            'type' => 'Barangay Clearance',
            'name' => $this->name,
            'zone' => $this->zone,
            'purpose' => $this->purpose,
            'token' => uniqid(Str::random(10), true),
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function view(Document $document)
    {
        $this->name = $document->name;
        $this->zone = $document->zone;
        $this->purpose = $document->purpose;
        $this->date_requested = $document->created_at;
    }

    public function editDoc(Document $document)
    {
        $this->doc_id = $document->id;
    }

    public function release()
    {
        $document = Document::find($this->doc_id);
        $document->is_released = true;
        $document->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }
    
    public function render()
    {
        $documents = Document::with('user')
            ->with('business')
            ->where('type', 'Barangay Clearance')
            ->where('is_released', false)
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('type', 'like', '%' . $this->search . '%')
                        ->orWhere('name', 'like', '%' . $this->search . '%')
                        ->orWhere('zone', 'like', '%' . $this->search . '%')
                        ->orWhere('purpose', 'like', '%' . $this->search . '%');
                })
                ->orWhere(function ($subQuery) {
                    $subQuery->whereHas('user', function ($query) {
                        $query->where('fname', 'like', '%' . $this->search . '%')
                            ->orWhere('lname', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('business', function ($query) {
                        $query->where('fname', 'like', '%' . $this->search . '%')
                            ->orWhere('lname', 'like', '%' . $this->search . '%');
                    });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'clearance');

        $taken_documents = Document::with('user')
            ->with('business')
            ->where('type', 'Barangay Clearance')
            ->where('is_released', true)
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('type', 'like', '%' . $this->history_search . '%')
                        ->orWhere('name', 'like', '%' . $this->history_search . '%')
                        ->orWhere('zone', 'like', '%' . $this->history_search . '%')
                        ->orWhere('purpose', 'like', '%' . $this->history_search . '%');
                })
                ->orWhere(function ($subQuery) {
                    $subQuery->whereHas('user', function ($query) {
                        $query->where('fname', 'like', '%' . $this->history_search . '%')
                            ->orWhere('lname', 'like', '%' . $this->history_search . '%');
                    })
                    ->orWhereHas('business', function ($query) {
                        $query->where('fname', 'like', '%' . $this->history_search . '%')
                            ->orWhere('lname', 'like', '%' . $this->history_search . '%');
                    });
                });
            })
            ->orderBy('updated_at', 'desc')
            ->paginate($this->history_paginate, ['*'], 'history');
        
        return view('livewire.admin.documents.brgy-clearances', [
            'documents' => $documents,
            'taken_documents' => $taken_documents,
        ]);
    }
}
