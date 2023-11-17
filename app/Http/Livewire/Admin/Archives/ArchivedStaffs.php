<?php

namespace App\Http\Livewire\Admin\Archives;

use App\Models\SubAdmin;
use Livewire\Component;
use Livewire\WithPagination;

class ArchivedStaffs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $staff_id;

    public function updatingSearch()
    {
        $this->resetPage('staffsPage');
    }

    public function resetVariables()
    {
        $this->staff_id = '';
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $staff = SubAdmin::onlyTrashed()->find($id);
        $this->staff_id = $staff->id;
    }

    public function restoreStaff()
    {
        $staff = SubAdmin::onlyTrashed()->find($this->staff_id);
        $staff->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
        $this->dispatchBrowserEvent('successToast', ['success' => 'User restored successfully']);
    }

    public function permanentlyDelConfirmation($id)
    {
        $staff = SubAdmin::onlyTrashed()->find($id);
        $this->staff_id = $staff->id;
    }

    public function permanentlyDel()
    {
        $staff = SubAdmin::onlyTrashed()->find($this->staff_id);
        $staff->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $staffs = SubAdmin::onlyTrashed()
        ->where(function($query){
            $query->where('lname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('mname', 'like', '%' . $this->search . '%')
            ->orWhere('position', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'staffsPage');

        return view('livewire.admin.archives.archived-staffs', [
            'staffs' => $staffs,
        ]);
    }
}
