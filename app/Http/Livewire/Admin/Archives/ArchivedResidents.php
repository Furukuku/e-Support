<?php

namespace App\Http\Livewire\Admin\Archives;

use App\Models\Family;
use Livewire\Component;
use Livewire\WithPagination;

class ArchivedResidents extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $search = "";

    public $family_id;

    public function updatingSearch()
    {
        $this->resetPage('familiesPage');
    }

    public function resetVariables()
    {
        $this->family_id = '';
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $family = Family::onlyTrashed()->find($id);
        $this->family_id = $family->id;
    }

    public function restoreFamily()
    {
        $family = Family::onlyTrashed()->find($this->family_id);
        $family->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function permanentlyDelConfirmation($id)
    {
        $family = Family::onlyTrashed()->find($id);
        $this->family_id = $family->id;
    }

    public function permanentlyDel()
    {
        $family = Family::onlyTrashed()->find($this->family_id);
        $family->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $families = Family::onlyTrashed()
        ->where(function($query){
            $query->where('head_fname', 'like', '%' . $this->search . '%')
            ->orWhere('head_mname', 'like', '%' . $this->search . '%')
            ->orWhere('head_lname', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'familiesPage');

        return view('livewire.admin.archives.archived-residents', [
            'families' => $families,
        ]);
    }
}
