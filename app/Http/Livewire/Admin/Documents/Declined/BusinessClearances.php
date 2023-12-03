<?php

namespace App\Http\Livewire\Admin\Documents\Declined;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class BusinessClearances extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];
    
    public $search = '';

    public $clearance_no, $business_nature, $owner_name, $business_name, $business_address, $owner_address, $date_requested, $decline_msg;
    public $proof;
    public $ctc_image, $ctc, $issued_at, $issued_on;

    public function updatingSearch()
    {
        $this->resetPage('declined');
    }

    public function closeModal()
    {
        $this->reset(
            'clearance_no',
            'business_nature',
            'owner_name',
            'business_name',
            'business_address',
            'owner_address',
            'date_requested',
            'decline_msg',
            'proof',
            'ctc_image',
            'ctc',
            'issued_at',
            'issued_on'
        );
    }

    public function view(Document $document)
    {
        $this->clearance_no = $document->bizClearance->clearance_no;
        $this->business_name = $document->bizClearance->biz_name;
        $this->business_address = $document->bizClearance->biz_address;
        $this->business_nature = $document->bizClearance->biz_nature;
        $this->owner_name = $document->bizClearance->biz_owner;
        $this->owner_address = $document->bizClearance->owner_address;
        $this->proof = $document->bizClearance->proof;
        $this->decline_msg = $document->decline_msg;
        $this->date_requested = $document->created_at;
        $this->ctc_image = $document->bizClearance->ctc_photo;
        $this->ctc = $document->bizClearance->ctc;
        $this->issued_at = $document->bizClearance->issued_at;
        $this->issued_on = $document->bizClearance->issued_on;
    }

    public function render()
    {
        $declined_documents = Document::with(['user', 'business', 'bizClearance'])
            ->where('type', 'Business Clearance')
            ->where('is_released', false)
            ->where('status', 'Declined')
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
            ->orderBy('updated_at', 'desc')
            ->paginate($this->paginate, ['*'], 'declined');

        return view('livewire.admin.documents.declined.business-clearances', ['declined_documents' => $declined_documents]);
    }
}
