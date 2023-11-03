<?php

namespace App\Http\Livewire\Admin\Archives;

use App\Models\Place;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ArchivedPlaces extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $place_id;

    public function updatingSearch()
    {
        $this->resetPage('placesPage');
    }

    public function resetVariables()
    {
        $this->place_id = '';
    }
    
    public function closeModal()
    {
        $this->resetVariables();
    }

    public function restoreConfirmation($id)
    {
        $place = Place::onlyTrashed()->find($id);
        $this->place_id = $place->id;
    }

    public function restorePlace()
    {
        $place = Place::onlyTrashed()->find($this->place_id);
        $place->restore();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function permanentlyDelConfirmation($id)
    {
        $place = Place::onlyTrashed()->find($id);
        $this->place_id = $place->id;
    }

    public function permanentlyDel()
    {
        $place = Place::onlyTrashed()->find($this->place_id);
        Storage::delete($place->display_img);
        $place->forceDelete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

    public function render()
    {
        $places = Place::onlyTrashed()
        ->where(function($query){
            $query->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('type', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('location', 'like', '%' . $this->search . '%');
        })
        ->orderBy('deleted_at', 'desc')
        ->paginate($this->paginate, ['*'], 'placesPage');

        return view('livewire.admin.archives.archived-places', ['places' => $places]);
    }
}
