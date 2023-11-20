<?php

namespace App\Http\Livewire\BHW\Archives;

use App\Models\BarangayHealthWorker;
use Livewire\Component;
use Livewire\WithPagination;

class BhwAccounts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $bhw_id;

    public function updatingSearch()
    {
        $this->resetPage('bhwPage');
    }

    public function resetVariables()
    {
        $this->bhw_id = '';
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $bhw = BarangayHealthWorker::onlyTrashed()->find($id);
        $this->bhw_id = $bhw->id;
    }

    public function restoreBhw()
    {
        $bhw = BarangayHealthWorker::onlyTrashed()->find($this->bhw_id);
        $bhw->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
        $this->dispatchBrowserEvent('successToast', ['success' => 'User restored successfully']);
    }

    public function permanentlyDelConfirmation($id)
    {
        $bhw = BarangayHealthWorker::onlyTrashed()->find($id);
        $this->bhw_id = $bhw->id;
    }

    public function permanentlyDel()
    {
        $bhw = BarangayHealthWorker::onlyTrashed()->find($this->bhw_id);
        $bhw->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $bhws = BarangayHealthWorker::onlyTrashed()
        ->where(function($query){
            $query->where('lname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('mname', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'bhwPage');

        return view('livewire.b-h-w.archives.bhw-accounts', ['bhws' => $bhws]);
    }
}
