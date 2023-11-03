<?php

namespace App\Http\Livewire\Business\RequestedDocs;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class ReadyToPickup extends Component
{
    use WithPagination;

    public function render()
    {
        $myToPickupDocs = Document::with('bizClearance')
            ->where('business_id', auth()->guard('business')->id())
            ->where('status', 'Ready To Pickup')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'ToPickupDocs');

        return view('livewire.business.requested-docs.ready-to-pickup', ['myToPickupDocs' => $myToPickupDocs]);
    }
}
