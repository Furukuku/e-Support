<?php

namespace App\Http\Livewire\Admin;

use App\Models\Place;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BusinessPlaces extends Component
{
    use WithFileUploads;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $display_image, $place_name, $type, $place_description, $location, $lat, $lng, $coordinates;

    public $view_display_image;

    public $business;
    public $place;

    public $place_id;

    public $reason, $other;

    public $category = 0;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];
    public $pending_paginate = 5;
    public $pending_paginate_values = [5, 10, 50, 100];

    public $search = "";
    public $pending_search = "";

    public function updatingSearch()
    {
        $this->resetPage('approvedPlaces');
        $this->resetPage('pendingPlaces');
    }

    public function closeModal()
    {
        $this->reset(
            'display_image',
            'place_name',
            'type',
            'other',
            'place_description',
            'location',
            'lat',
            'lng',
            'coordinates',
            'business',
            'place',
            'reason',
            'other'
        );
    }

    public function view(Place $place)
    {
        $this->view_display_image = $place->display_img;
        $this->place_name = $place->name;
        $this->type = $place->type;
        $this->location = $place->location;
        $this->place_description = $place->description;
        $this->business = $place->business;
        $this->place = $place;
    }

    public function approve()
    {
        $place = Place::find($this->place->id);
        $place->is_approved = true;
        $place->decline_msg = null;
        $place->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Business approved successfully']);
    }

    public function declineConfirm()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('confirm-decline');
    }

    public function decline()
    {
        $place = Place::find($this->place->id);

        if($this->reason === 'Other'){
            $this->validate([
                'other' => ['required', 'string', 'max:150']
            ]);

            $place->decline_msg = $this->other;
        }else {
            $this->validate([
                'reason' => ['required', 'string', 'max:150']
            ]);

            $place->decline_msg = $this->reason;
        }

        $place->is_approved = false;
        $place->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Business declined successfully']);
    }

    public function archiveConfirmation(Place $place)
    {
        $this->place_id = $place->id;
    }

    public function archive()
    {
        Place::find($this->place_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Business archived successfully']);
    }

    public function render()
    {
        $businesses = Place::with('business')
            ->where('business_id', '!=', null)
            ->where('is_approved', true)
            ->where(function($query) {
                $inner_search = $this->search;
                $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('type', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('location', 'like', '%' . $this->search . '%')
                ->orWhereHas('business', function($subQuery) use ($inner_search){
                    $subQuery->where('fname', 'LIKE', '%' . $inner_search . '%')
                        ->orWhere('lname', 'LIKE', '%' . $inner_search . '%')
                        ->orWhere('mname', 'LIKE', '%' . $inner_search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'approvedPlaces');

        $pending_businesses = Place::with('business')
            ->where('business_id', '!=', null)
            ->where('is_approved', false)
            ->where('decline_msg', null)
            ->where(function($query) {
                $inner_search = $this->pending_search;
                $query->where('name', 'like', '%' . $this->pending_search . '%')
                ->orWhere('type', 'like', '%' . $this->pending_search . '%')
                ->orWhere('description', 'like', '%' . $this->pending_search . '%')
                ->orWhere('location', 'like', '%' . $this->pending_search . '%')
                ->orWhereHas('business', function($subQuery) use ($inner_search){
                    $subQuery->where('fname', 'LIKE', '%' . $inner_search . '%')
                        ->orWhere('lname', 'LIKE', '%' . $inner_search . '%')
                        ->orWhere('mname', 'LIKE', '%' . $inner_search . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->pending_paginate, ['*'], 'pendingPlaces');

        return view('livewire.admin.business-places', [
            'businesses' => $businesses,
            'pending_businesses' => $pending_businesses,
        ]);
    }
}
