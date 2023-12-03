<?php

namespace App\Http\Livewire\SubAdmin\Documents\Declined;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class BrgyClearances extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];
    
    public $search = '';

    public $name, $zone, $purpose, $date_requested, $decline_msg;
    public $ctc_image, $ctc, $issued_at, $issued_on;

    public function updatingSearch()
    {
        $this->resetPage('declined');
    }

    public function closeModal()
    {
        $this->reset(
            'name',
            'zone',
            'purpose',
            'date_requested',
            'ctc_image',
            'ctc',
            'issued_at',
            'issued_on',
            'decline_msg'
        );
    }

    public function view(Document $document)
    {
        $this->name = $document->brgyClearance->name;
        $this->zone = $document->brgyClearance->zone;
        $this->purpose = $document->brgyClearance->purpose;
        $this->date_requested = $document->created_at;
        $this->decline_msg = $document->decline_msg;
        $this->ctc_image = $document->brgyClearance->ctc_photo;
        $this->ctc = $document->brgyClearance->ctc;
        $this->issued_at = $document->brgyClearance->issued_at;
        $this->issued_on = $document->brgyClearance->issued_on;
    }

    public function render()
    {
        $declined_documents = Document::with(['user', 'brgyClearance'])
            ->where('type', 'Barangay Clearance')
            ->where('is_released', false)
            ->where('status', 'Declined')
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
            ->orderBy('updated_at', 'desc')
            ->paginate($this->paginate, ['*'], 'declined');

        return view('livewire.sub-admin.documents.declined.brgy-clearances', ['declined_documents' => $declined_documents]);
    }
}
