<?php

namespace App\Http\Livewire\Resident\RequestedDocs;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class ReadyToPickup extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myToPickupDocs = Document::with(['brgyClearance', 'bizClearance', 'indigency'])
            ->where('user_id', auth()->guard('web')->id())
            ->where('status', 'Ready To Pickup')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'ToPickupDocs');

        return view('livewire.resident.requested-docs.ready-to-pickup', ['myToPickupDocs' => $myToPickupDocs]);
    }
}
