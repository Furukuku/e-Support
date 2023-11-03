<?php

namespace App\Http\Livewire\Business\RequestedDocs;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class Pending extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myPendingDocs = Document::with('bizClearance')
            ->where('business_id', auth()->guard('business')->id())
            ->where('status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'pendingDocs');

        return view('livewire.business.requested-docs.pending', ['myPendingDocs' => $myPendingDocs]);
    }
}
