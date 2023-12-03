<?php

namespace App\Http\Livewire\SubAdmin\Documents\Declined;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class Indigencies extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];
    
    public $search = '';

    public $name, $purpose, $date_requested, $decline_msg;

    public function updatingSearch()
    {
        $this->resetPage('declined');
    }

    public function closeModal()
    {
        $this->reset(
            'name',
            'purpose',
            'date_requested',
            'decline_msg'
        );
    }

    public function view(Document $document)
    {
        $this->name = $document->indigency->name;
        $this->purpose = $document->indigency->purpose;
        $this->date_requested = $document->created_at;
        $this->decline_msg = $document->decline_msg;
    }

    public function render()
    {
        $declined_documents = Document::with(['user', 'indigency'])
            ->where('type', 'Indigency')
            ->where('is_released', false)
            ->where('status', 'Declined')
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
            ->orderBy('updated_at', 'desc')
            ->paginate($this->paginate, ['*'], 'declined');

        return view('livewire.sub-admin.documents.declined.indigencies', ['declined_documents' => $declined_documents]);
    }
}
