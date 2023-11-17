<?php

namespace App\Http\Livewire\Admin\Archives;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ArchivedResidentUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $resident_id;

    public function updatingSearch()
    {
        $this->resetPage('residentsPage');
    }

    public function resetVariables()
    {
        $this->resident_id = '';
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $resident = User::onlyTrashed()->find($id);
        $this->resident_id = $resident->id;
    }

    public function restoreResident()
    {
        $resident = User::onlyTrashed()->find($this->resident_id);
        $resident->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
        $this->dispatchBrowserEvent('successToast', ['success' => 'User restored successfully']);
    }

    public function permanentlyDelConfirmation($id)
    {
        $resident = User::onlyTrashed()->find($id);
        $this->resident_id = $resident->id;
    }

    public function permanentlyDel()
    {
        $resident = User::onlyTrashed()->find($this->resident_id);
        Storage::delete([$resident->profile, $resident->verification_img]);
        $resident->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $residents = User::onlyTrashed()
        ->where(function($query){
            $query->where('lname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('mname', 'like', '%' . $this->search . '%')
            ->orWhere('sname', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'residentsPage');

        return view('livewire.admin.archives.archived-resident-users', [
            'residents' => $residents,
        ]);
    }
}
