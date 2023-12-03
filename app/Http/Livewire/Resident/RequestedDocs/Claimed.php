<?php

namespace App\Http\Livewire\Resident\RequestedDocs;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;

class Claimed extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myClaimedDocs = Document::with(['brgyClearance', 'bizClearance', 'indigency'])
            ->where('user_id', auth()->guard('web')->id())
            ->where(function($query) {
                $query->where('status', 'Released')
                    ->orWhere('status', 'Declined');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'claimedDocs');

        return view('livewire.resident.requested-docs.claimed', ['myClaimedDocs' => $myClaimedDocs]);
    }
}
