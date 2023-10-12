<?php

namespace App\Http\Livewire\Resident\RequestedDocs;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Document;

class Pending extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myPendingDocs = Document::with(['brgyClearance', 'bizClearance', 'indigency'])
            ->where('user_id', auth()->guard('web')->id())
            ->where('status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'pendingDocs');

        return view('livewire.resident.requested-docs.pending', ['myPendingDocs' => $myPendingDocs]);
    }
}
