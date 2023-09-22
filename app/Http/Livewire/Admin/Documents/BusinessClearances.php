<?php

namespace App\Http\Livewire\Admin\Documents;

use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class BusinessClearances extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $history_paginate = 5;
    
    public $search = '';

    public $history_search = '';
    
    protected $listeners = ['getDocDetails'];

    public $biz_name, $biz_owner, $biz_address, $biz_nature, $owner_address, $date_requested, $type;

    public $business_nature, $owner_name, $business_name, $business_address;

    public $doc_id;

    public $error_msg = '';

    public function updatingSearch()
    {
        $this->resetPage('clearance');
        $this->resetPage('history');
    }

    public function closeModal()
    {
        $this->reset(
            'biz_name', 
            'biz_owner', 
            'biz_address', 
            'biz_nature', 
            'owner_address', 
            'date_requested', 
            'type',
            'doc_id',
            'error_msg',
            'business_nature',
            'owner_name',
            'business_name',
            'business_address',
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
    
                if($document !== null && $document->is_released == false && $document->type === 'Business Clearance'){
                    $this->doc_id = $document->id;
                    $this->type = $document->type;
                    $this->biz_name = $document->biz_name;
                    $this->biz_address = $document->biz_address;
                    $this->biz_nature = $document->biz_nature;
                    $this->biz_owner = $document->biz_owner;
                    $this->owner_address = $document->owner_address;
                    $this->date_requested = $document->created_at;
                }else if($document !== null && $document->is_released == true && $document->type === 'Business Clearance'){
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
            'business_nature' => ['required', 'string', 'max:255'],
            'owner_name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'owner_address' => ['required', 'string', 'max:255'],
            'business_address' => ['required', 'string', 'max:255'],
        ]);

        Document::create([
            'type' => 'Business Clearance',
            'biz_name' => $this->business_name,
            'biz_address' => $this->business_address,
            'biz_nature' => $this->business_nature,
            'biz_owner' => $this->owner_name,
            'owner_address' => $this->owner_address,
            'token' => uniqid(Str::random(10), true),
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->closeModal();
    }

    public function view(Document $document)
    {
        $this->biz_name = $document->biz_name;
        $this->biz_address = $document->biz_address;
        $this->biz_nature = $document->biz_nature;
        $this->biz_owner = $document->biz_owner;
        $this->owner_address = $document->owner_address;
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
            ->where('type', 'Business Clearance')
            ->where('is_released', false)
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('type', 'like', '%' . $this->search . '%')
                        ->orWhere('biz_name', 'like', '%' . $this->search . '%')
                        ->orWhere('biz_nature', 'like', '%' . $this->search . '%')
                        ->orWhere('biz_address', 'like', '%' . $this->search . '%')
                        ->orWhere('biz_owner', 'like', '%' . $this->search . '%');
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
            ->where('type', 'Business Clearance')
            ->where('is_released', true)
            ->where(function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('type', 'like', '%' . $this->history_search . '%')
                        ->orWhere('biz_name', 'like', '%' . $this->history_search . '%')
                        ->orWhere('biz_nature', 'like', '%' . $this->history_search . '%')
                        ->orWhere('biz_address', 'like', '%' . $this->history_search . '%')
                        ->orWhere('biz_owner', 'like', '%' . $this->history_search . '%');
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


        return view('livewire.admin.documents.business-clearances', [
            'documents' => $documents,
            'taken_documents' => $taken_documents,
        ]);
    }
}
