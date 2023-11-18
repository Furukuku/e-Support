<?php

namespace App\Http\Livewire\Business;

use App\Models\Place;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShareLocation extends Component
{
    use WithFileUploads;

    public $business_image, $business_name, $type, $other, $description, $location, $lat, $lng, $coordinates;
    public $editable = 0;
    public $drag = false;

    protected $listeners = ['convertLocToGeo', 'showData', 'submit', 'update', 'deletePost', 'refreshComponent' => '$refresh'];

    protected $messages = [
        'coordinates.required' => 'The location field is required.',
    ];

    public function resetInputs()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(
            'business_image',
            'business_name',
            'type',
            'other',
            'description',
            'location',
            'lat',
            'lng',
            'coordinates',
            'editable',
            'drag'
        );
    }

    public function showData()
    {
        $my_place = Place::withTrashed()
            ->where('business_id', auth()->guard('business')->id())
            ->first();

        if(!is_null($my_place)){
            $place = Place::withTrashed()->find($my_place->id);
            $this->business_image = $place->display_img;
            $this->business_name = $place->name;
            $this->type = $place->type;
            $this->location = $place->location;
            $this->description = $place->description;
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
    
            $this->dispatchBrowserEvent('edit-map', [
                'lat' => $place->latitude,
                'lng' => $place->longitude,
                'drag' => $this->drag,
            ]);

        }else{
            $this->dispatchBrowserEvent('show-map');
        }
    }

    public function edit()
    {
        $this->editable = 1;
        $this->drag = true;
        $this->showData();
    }

    public function convertLocToGeo($lat, $lng, $coordinates, $address)
    {
        $this->lat = $lat;
        $this->lng = $lng;
        $this->coordinates = $coordinates;
        $this->location = $address;
    }

    public function submit()
    {
        if($this->type === 'Other'){
            $this->validate([
                'business_image' => ['required', 'image'],
                'business_name' => ['required', 'string', 'max:255'],
                'type' => ['required', 'string', 'max:15'],
                'other' => ['required', 'string', 'max:100'],
                'description' => ['required', 'string'],
                'coordinates' => ['required'],
            ]);
        }else{
            $this->validate([
                'business_image' => ['required', 'image'],
                'business_name' => ['required', 'string', 'max:255'],
                'type' => ['required', 'string', 'max:15'],
                'description' => ['required', 'string'],
                'coordinates' => ['required'],
            ]);
        }

        $display_img_filename = $this->business_image->store('public/images/profiles/places');

        Place::create([
            'business_id' => auth()->guard('business')->id(),
            'display_img' => $display_img_filename,
            'name' => $this->business_name,
            'type' => $this->type === 'Other' ? $this->other : $this->type,
            'description' => $this->description,
            'location' => $this->location,
            'latitude' => $this->lat,
            'longitude' => $this->lng,
            'is_approved' => false,
        ]);

        return redirect()->route('business.share.location')->with('success', 'Post submitted successfully');
    }

    public function update()
    {
        $myBiz = Place::withTrashed()
            ->where('business_id', auth()->guard('business')->id())
            ->first();

        if($this->business_image != $myBiz->display_img){
            if($this->type === 'Other'){
                $this->validate([
                    'business_image' => ['required', 'image'],
                    'business_name' => ['required', 'string', 'max:255'],
                    'type' => ['required', 'string', 'max:15'],
                    'other' => ['required', 'string', 'max:100'],
                    'description' => ['required', 'string'],
                ]);
            }else{
                $this->validate([
                    'business_image' => ['required', 'image'],
                    'business_name' => ['required', 'string', 'max:255'],
                    'type' => ['required', 'string', 'max:15'],
                    'description' => ['required', 'string'],
                ]);
            }

            Storage::disk('local')->delete($myBiz->display_img);

    
            $display_img_filename = $this->business_image->store('public/images/profiles/places');
    
            $place = Place::withTrashed()->find($myBiz->id);
            $place->display_img = $display_img_filename;
            $place->name = $this->business_name;
            $place->type = $this->type === 'Other' ? $this->other : $this->type;
            $place->description = $this->description;
            $place->location = $this->location;
            $place->latitude = $this->lat;
            $place->longitude = $this->lng;
            $place->decline_msg = null;
            $place->update();
        }else{
            if($this->type === 'Other'){
                $this->validate([
                    'business_name' => ['required', 'string', 'max:255'],
                    'type' => ['required', 'string', 'max:15'],
                    'other' => ['required', 'string', 'max:100'],
                    'description' => ['required', 'string'],
                ]);
            }else{
                $this->validate([
                    'business_name' => ['required', 'string', 'max:255'],
                    'type' => ['required', 'string', 'max:15'],
                    'description' => ['required', 'string'],
                ]);
            }

            $place = Place::withTrashed()->find($myBiz->id);
            $place->name = $this->business_name;
            $place->type = $this->type === 'Other' ? $this->other : $this->type;
            $place->description = $this->description;
            $place->location = $this->location;
            $place->latitude = $this->lat;
            $place->longitude = $this->lng;
            $place->decline_msg = null;
            $place->update();
        }
        
        $this->resetInputs();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Post updated successfully']);
        $this->showData();
    }

    public function cancel()
    {
        $this->editable = 0;
        $this->drag = false;
        $this->showData();
    }

    public function deletePost()
    {
        $myBiz = Place::withTrashed()
            ->where('business_id', auth()->guard('business')->id())
            ->first();
            
        $place = Place::withTrashed()->find($myBiz->id);
        Storage::disk('local')->delete($place->display_img);
        $place->forceDelete();

        return redirect()->route('business.share.location')->with('success', 'Post deleted successfully');
    }

    public function render()
    {
        $place = Place::withTrashed()
            ->where('business_id', auth()->guard('business')->id())
            ->first();
        
        return view('livewire.business.share-location', ['place' => $place]);
    }
}
