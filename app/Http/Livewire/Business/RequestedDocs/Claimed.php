<?php

namespace App\Http\Livewire\Business\RequestedDocs;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class Claimed extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myClaimedDocs = Document::with(['brgyClearance', 'bizClearance', 'indigency'])
            ->where('business_id', auth()->guard('business')->id())
            ->where('status', 'Released')
            ->where('is_released', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'claimedDocs');

        return view('livewire.business.requested-docs.claimed', ['myClaimedDocs' => $myClaimedDocs]);
    }
}
