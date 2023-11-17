<?php

namespace App\Http\Livewire\BHW;

use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Programs extends Component
{
    use WithFileUploads;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $program_id, $program_title, $display_image, $program_description, $program_created;

    public $view_display_image;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetInputs()
    {
        $this->display_image = null;
        $this->program_title = "";
        $this->program_description = "";
        $this->program_id = "";
        $this->program_created = "";
        $this->view_display_image = null;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetInputs();
    }

    public function add()
    {
        $this->validate([
            'display_image' => 'required|image',
            'program_title' => 'required|string|max:255',
            'program_description' => 'required|string',
        ]);

        $display_img_filename = $this->display_image->store('public/images/profiles/programs');

        Program::create([
            'display_img' => $display_img_filename,
            'title' => $this->program_title,
            'description' => $this->program_description,
        ]);

        $this->dispatchBrowserEvent('close-modal');

        $this->resetInputs();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Program successfully created']);
    }

    public function view(Program $program)
    {
        $this->program_title = $program->title;
        $this->view_display_image = $program->display_img;
        $this->program_description = $program->description;
        $this->program_created = $program->created_at;
    }

    public function edit(Program $program)
    {
        $this->program_id = $program->id;
        $this->program_title = $program->title;
        $this->display_image = $program->display_img;
        $this->program_description = $program->description;
    }

    public function update()
    {
        $old_program = Program::find($this->program_id);

        if($this->display_image != $old_program->display_img){
            $this->validate([
                'display_image' => 'required|image',
                'program_title' => 'required|string|max:255',
                'program_description' => 'required|string',
            ]);

            Storage::disk('local')->delete($old_program->display_img);

            $display_img_filename = $this->display_image->store('public/images/profiles/programs');

            $program = Program::find($this->program_id);
            $program->display_img = $display_img_filename;
            $program->title = $this->program_title;
            $program->description = $this->program_description;
            $program->update();

        }else{
            $this->validate([
                'program_title' => 'required|string|max:255',
                'program_description' => 'required|string',
            ]);

            $program = Program::find($this->program_id);
            $program->title = $this->program_title;
            $program->description = $this->program_description;
            $program->update();
        }


        $this->dispatchBrowserEvent('close-modal');

        $this->resetInputs();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Program updated successfully']);
    }

    public function archiveConfirmation(Program $program)
    {
        $this->program_id = $program->id;
    }

    public function archive()
    {
        Program::find($this->program_id)->delete();
        
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Program archived successfully']);
    }

    public function render()
    {
        $programs = Program::where('title', 'like', '%' . $this->search . '%')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'desc')
        ->paginate($this->paginate);

        return view('livewire.b-h-w.programs', ['programs' => $programs]);
    }
}
