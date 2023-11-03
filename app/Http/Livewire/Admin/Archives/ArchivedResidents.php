<?php

namespace App\Http\Livewire\Admin\Archives;

use App\Models\Family;
use App\Models\FamilyHead;
use Livewire\Component;
use Livewire\WithPagination;

class ArchivedResidents extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $family_head_id;

    public function updatingSearch()
    {
        $this->resetPage('familiesPage');
    }

    public function resetVariables()
    {
        $this->family_head_id = null;
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $this->family_head_id = $id;
    }

    public function restoreFamily()
    {
        $family_head = FamilyHead::onlyTrashed()->find($this->family_head_id);
        $family_head->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function permanentlyDelConfirmation($id)
    {
        $this->family_head_id = $id;
    }

    public function permanentlyDel()
    {
        $family_head = FamilyHead::onlyTrashed()->find($this->family_head_id);
        $family_head->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $families = FamilyHead::onlyTrashed()
        ->where(function($query){
            $query->where('fullname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('mname', 'like', '%' . $this->search . '%')
            ->orWhere('lname', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'familiesPage');

        return view('livewire.admin.archives.archived-residents', [
            'families' => $families,
        ]);
    }
}
