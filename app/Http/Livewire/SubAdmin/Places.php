<?php

namespace App\Http\Livewire\SubAdmin;

use App\Models\Place;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Places extends Component
{
    use WithFileUploads;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $display_image, $place_name, $type, $place_description, $location, $lat, $lng, $coordinates;

    public $view_display_image;

    public $place_id;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    protected $listeners = ['convertLocToGeo'];

    protected $messages = [
        'coordinates.required' => 'The location field is required.',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetInputs()
    {
        $this->place_id = '';
        $this->display_image = null;
        $this->place_name = '';
        $this->type = '';
        $this->place_description = '';
        $this->lat = '';
        $this->lng = '';
        $this->coordinates = null;
        $this->location = '';
        $this->view_display_image = null;
    }

    public function closeModal()
    {
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function convertLocToGeo($lat, $lng, $coordinates, $address)
    {
        $this->lat = $lat;
        $this->lng = $lng;
        $this->coordinates = $coordinates;
        $this->location = $address;
    }

    public function add()
    {
        $this->validate([
            'display_image' => 'required|image',
            'place_name' => 'required|string',
            'type' => 'required|string|max:15',
            'place_description' => 'required|string',
            'coordinates' => 'required',
        ]);

        $display_img_filename = $this->display_image->store('public/images/profiles/places');

        Place::create([
            'display_img' => $display_img_filename,
            'name' => $this->place_name,
            'type' => $this->type,
            'description' => $this->place_description,
            'location' => $this->location,
            'latitude' => $this->lat,
            'longitude' => $this->lng,
        ]);

        $this->dispatchBrowserEvent('close-modal');

        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function view(Place $place)
    {
        $this->view_display_image = $place->display_img;
        $this->place_name = $place->name;
        $this->type = $place->type;
        $this->location = $place->location;
        $this->place_description = $place->description;
    }

    public function edit(Place $place)
    {
        $this->place_id = $place->id;
        $this->display_image = $place->display_img;
        $this->place_name = $place->name;
        $this->type = $place->type;
        $this->location = $place->location;
        $this->place_description = $place->description;
        $this->lat = $place->latitude;
        $this->lng = $place->longitude;

        $this->dispatchBrowserEvent('edit-modal', [
            'lat' => $place->latitude,
            'lng' => $place->longitude,
        ]);
    }

    public function update()
    {
        $old_place = Place::find($this->place_id);

        if($this->display_image != $old_place->display_img){
            $this->validate([
                'display_image' => 'required|image',
                'place_name' => 'required|string',
                'type' => 'required|string|max:15',
                'place_description' => 'required|string',
                // 'coordinates' => 'required',
            ]);

            Storage::disk('local')->delete($old_place->display_img);

    
            $display_img_filename = $this->display_image->store('public/images/profiles/places');
    
            $place = Place::find($this->place_id);
            $place->display_img = $display_img_filename;
            $place->name = $this->place_name;
            $place->type = $this->type;
            $place->description = $this->place_description;
            $place->location = $this->location;
            $place->latitude = $this->lat;
            $place->longitude = $this->lng;
            $place->update();
        }else{
            $this->validate([
                'place_name' => 'required|string',
                'type' => 'required|string|max:15',
                'place_description' => 'required|string',
                // 'coordinates' => 'required',
            ]);

            $place = Place::find($this->place_id);
            $place->name = $this->place_name;
            $place->type = $this->type;
            $place->description = $this->place_description;
            $place->location = $this->location;
            $place->latitude = $this->lat;
            $place->longitude = $this->lng;
            $place->update();
        }
        
        $this->dispatchBrowserEvent('close-modal');

        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function archiveConfirmation(Place $place)
    {
        $this->place_id = $place->id;
    }

    public function archive()
    {
        Place::find($this->place_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
    }

    public function render()
    {
        $places = Place::where('name', 'like', '%' . $this->search . '%')
        ->orWhere('type', 'like', '%' . $this->search . '%')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->orWhere('location', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'desc')
        ->paginate($this->paginate);

        return view('livewire.sub-admin.places', ['places' => $places]);
    }
}
