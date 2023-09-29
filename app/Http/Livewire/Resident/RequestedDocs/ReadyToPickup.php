<?php

namespace App\Http\Livewire\Resident\RequestedDocs;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;

class ReadyToPickup extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myPickupDocs = Document::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Ready to Pickup')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'toPickupDocs');

        return view('livewire.resident.requested-docs.ready-to-pickup', ['myPickupDocs' => $myPickupDocs]);
    }
}
