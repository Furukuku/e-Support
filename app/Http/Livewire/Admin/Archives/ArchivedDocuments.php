<?php

namespace App\Http\Livewire\Admin\Archives;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class ArchivedDocuments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $doc_id;

    public function updatingSearch()
    {
        $this->resetPage('documentsPage');
    }
    
    public function closeModal()
    {
        $this->reset('doc_id');
    }

    public function restoreConfirmation($id)
    {
        $document = Document::onlyTrashed()->find($id);
        $this->doc_id = $document->id;
    }

    public function restoreDocument()
    {
        $document = Document::onlyTrashed()->find($this->doc_id);
        $document->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Document restored successfully']);
    }
    public function render()
    {
        $documents = Document::with(['brgyClearance', 'bizClearance', 'indigency'])
            ->onlyTrashed()
            ->where(function($query){
                $inner_search = $this->search;
                $query->where('type', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('brgyClearance', function($subQuery) use ($inner_search){
                        $subQuery->where('name', 'LIKE', '%' . $inner_search . '%')
                            ->orWhere('purpose', 'LIKE', '%' . $inner_search . '%');
                    })
                    ->orWhereHas('bizClearance', function($subQuery) use ($inner_search){
                        $subQuery->where('biz_owner', 'LIKE', '%' . $inner_search . '%')
                            ->orWhere('biz_name', 'LIKE', '%' . $inner_search . '%')
                            ->orWhere('clearance_no', 'LIKE', '%' . $inner_search . '%');
                    })
                    ->orWhereHas('indigency', function($subQuery) use ($inner_search){
                        $subQuery->where('name', 'LIKE', '%' . $inner_search . '%')
                            ->orWhere('purpose', 'LIKE', '%' . $inner_search . '%');
                    });
            })
            ->orderBy('deleted_at', 'desc')
            ->paginate($this->paginate, ['*'], 'documentsPage');

        return view('livewire.admin.archives.archived-documents', ['documents' => $documents]);
    }
}
