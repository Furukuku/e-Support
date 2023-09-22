<?php

namespace App\Http\Livewire\Admin\Archives;

use Livewire\Component;
use App\Models\Business;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ArchivedBusinessUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;

    public $search = "";

    public $business_id;

    public function updatingSearch()
    {
        $this->resetPage('businessesPage');
    }

    public function resetVariables()
    {
        $this->business_id = '';
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $business = Business::onlyTrashed()->find($id);
        $this->business_id = $business->id;
    }

    public function restoreBusiness()
    {
        $business = Business::onlyTrashed()->find($this->business_id);
        $business->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function permanentlyDelConfirmation($id)
    {
        $business = Business::onlyTrashed()->find($id);
        $this->business_id = $business->id;
    }

    public function permanentlyDel()
    {
        $business = Business::onlyTrashed()->find($this->business_id);
        Storage::delete([$business->profile, $business->biz_clearance]);
        $business->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $businesses = Business::onlyTrashed()
        ->where(function($query){
            $query->where('lname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('mname', 'like', '%' . $this->search . '%')
            ->orWhere('sname', 'like', '%' . $this->search . '%')
            ->orWhere('biz_name', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'businessesPage');

        return view('livewire.admin.archives.archived-business-users', [
            'businesses' => $businesses,
        ]);
    }
}
