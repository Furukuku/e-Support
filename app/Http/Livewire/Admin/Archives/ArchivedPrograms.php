<?php

namespace App\Http\Livewire\Admin\Archives;

use App\Models\Program;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ArchivedPrograms extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $program_id;

    public function updatingSearch()
    {
        $this->resetPage('programsPage');
    }

    public function resetVariables()
    {
        $this->program_id = '';
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $program = Program::onlyTrashed()->find($id);
        $this->program_id = $program->id;
    }

    public function restoreProgram()
    {
        $program = Program::onlyTrashed()->find($this->program_id);
        $program->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Program restored successfully']);
    }

    public function permanentlyDelConfirmation($id)
    {
        $program = Program::onlyTrashed()->find($id);
        $this->program_id = $program->id;
    }

    public function permanentlyDel()
    {
        $program = Program::onlyTrashed()->find($this->program_id);
        Storage::delete($program->display_img);
        $program->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $programs = Program::onlyTrashed()
        ->where(function($query){
            $query->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'programsPage');

        return view('livewire.admin.archives.archived-programs', ['programs' => $programs]);
    }
}
