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
        $myClaimedDocs = Document::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Released')
            ->where('is_released', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.resident.requested-docs.claimed', ['myClaimedDocs' => $myClaimedDocs]);
    }
}