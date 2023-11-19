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

    public $display_image, $place_name, $type, $other, $place_description, $location, $lat, $lng, $coordinates;

    public $view_display_image;

    public $place_id;
    public $business;
    public $place;
    public $reason;

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
        $this->other = '';
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
        if($this->type === 'Other'){
            $this->validate([
                'display_image' => 'required|image',
                'place_name' => 'required|string',
                'type' => 'required|string|max:15',
                'other' => 'required|string|max:100',
                'place_description' => 'required|string',
                'coordinates' => 'required',
            ]);
        }else{
            $this->validate([
                'display_image' => 'required|image',
                'place_name' => 'required|string',
                'type' => 'required|string|max:15',
                'place_description' => 'required|string',
                'coordinates' => 'required',
            ]);
        }

        $display_img_filename = $this->display_image->store('public/images/profiles/places');

        Place::create([
            'display_img' => $display_img_filename,
            'name' => $this->place_name,
            'type' => $this->type === 'Other' ? $this->other : $this->type,
            'description' => $this->place_description,
            'location' => $this->location,
            'latitude' => $this->lat,
            'longitude' => $this->lng,
        ]);

        $this->dispatchBrowserEvent('close-modal');

        $this->resetInputs();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Place successfully created']);
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

        switch($place->type){
            case 'Mall':
                $this->type = $place->type;
                break;
            case 'Restaurant':
                $this->type = $place->type;
                break;
            case 'Store':
                $this->type = $place->type;
                break;
            case 'Car Wash':
                $this->type = $place->type;
                break;
            case 'Repair Shop':
                $this->type = $place->type;
                break;
            case 'Junk Shop':
                $this->type = $place->type;
                break;
            case 'Pharmacies':
                $this->type = $place->type;
                break;
            default:
                $this->type = 'Other';
                $this->other = $place->type;
        }

        $this->dispatchBrowserEvent('edit-modal', [
            'lat' => $place->latitude,
            'lng' => $place->longitude,
        ]);
    }

    public function update()
    {
        $old_place = Place::find($this->place_id);

        if($this->display_image != $old_place->display_img){
            if($this->type === 'Other'){
                $this->validate([
                    'display_image' => 'required|image',
                    'place_name' => 'required|string',
                    'type' => 'required|string|max:15',
                    'other' => 'required|string|max:100',
                    'place_description' => 'required|string',
                    // 'coordinates' => 'required',
                ]);
            }else{
                $this->validate([
                    'display_image' => 'required|image',
                    'place_name' => 'required|string',
                    'type' => 'required|string|max:15',
                    'place_description' => 'required|string',
                ]);
            }

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
            if($this->type === 'Other'){
                $this->validate([
                    'place_name' => 'required|string',
                    'type' => 'required|string|max:15',
                    'other' => 'required|string|max:100',
                    'place_description' => 'required|string',
                ]);
            }else{
                $this->validate([
                    'place_name' => 'required|string',
                    'type' => 'required|string|max:15',
                    'place_description' => 'required|string',
                ]);
            }

            $place = Place::find($this->place_id);
            $place->name = $this->place_name;
            $place->type = $this->type === 'Other' ? $this->other : $this->type;
            $place->description = $this->place_description;
            $place->location = $this->location;
            $place->latitude = $this->lat;
            $place->longitude = $this->lng;
            $place->update();
        }
        
        $this->dispatchBrowserEvent('close-modal');

        $this->resetInputs();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Place updated successfully']);
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
        $this->dispatchBrowserEvent('successToast', ['success' => 'Place archived successfully']);
    }

    public function render()
    {
        $places = Place::where('business_id', null)
            ->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('type', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('location', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.sub-admin.places', ['places' => $places]);
    }
}
