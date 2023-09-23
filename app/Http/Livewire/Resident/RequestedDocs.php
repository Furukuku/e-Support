<?php

namespace App\Http\Livewire\Resident;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class RequestedDocs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myDocs =Document::where('user_id', auth()->guard('web')->id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.resident.requested-docs', ['myDocs' => $myDocs]);
    }
}
