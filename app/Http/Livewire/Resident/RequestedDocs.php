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
            ->orderByRaw("CASE
                WHEN status = 'Ready to Pickup' THEN 1
                WHEN status = 'Pending' THEN 2
                WHEN status = 'Released' AND is_released = true THEN 3
                ELSE 4
                END")
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('livewire.resident.requested-docs', ['myDocs' => $myDocs]);
    }
}
