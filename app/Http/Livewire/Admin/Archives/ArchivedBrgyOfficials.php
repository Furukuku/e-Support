<?php

namespace App\Http\Livewire\Admin\Archives;

use Livewire\Component;
use App\Models\BrgyOfficial;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ArchivedBrgyOfficials extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $official_id;

    public $d_archive = 0;

    public function updatingSearch()
    {
        $this->resetPage('officialsPage');
    }

    public function resetVariables()
    {
        $this->official_id = '';
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $official = BrgyOfficial::onlyTrashed()->find($id);
        $this->official_id = $official->id;
    }

    public function restoreOfficial()
    {
        $official = BrgyOfficial::onlyTrashed()->find($this->official_id);
        $official->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function permanentlyDelConfirmation($id)
    {
        $official = BrgyOfficial::onlyTrashed()->find($id);
        $this->official_id = $official->id;
    }

    public function permanentlyDel()
    {
        $official = BrgyOfficial::onlyTrashed()->find($this->official_id);
        Storage::delete($official->display_img);
        $official->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $officials = BrgyOfficial::onlyTrashed()
        ->where(function($query){
            $query->where('lname', 'like', '%' . $this->search . '%')
            ->orWhere('fname', 'like', '%' . $this->search . '%')
            ->orWhere('mname', 'like', '%' . $this->search . '%')
            ->orWhere('sname', 'like', '%' . $this->search . '%')
            ->orWhere('zone', 'like', '%' . $this->search . '%')
            ->orWhere('gender', 'like', '%' . $this->search . '%')
            ->orWhere('bday', 'like', '%' . $this->search . '%')
            ->orWhere('position', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'officialsPage');

        return view('livewire.admin.archives.archived-brgy-officials', [
            'officials' => $officials,
        ]);
    }
}
