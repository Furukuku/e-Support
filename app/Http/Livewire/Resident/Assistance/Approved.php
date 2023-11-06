<?php

namespace App\Http\Livewire\Resident\Assistance;

use App\Models\Assistance;
use Livewire\Component;
use Livewire\WithPagination;

class Approved extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myApprovedAssistances = Assistance::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Approved')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'approvedAssistances');

        return view('livewire.resident.assistance.approved', [
            'myApprovedAssistances' => $myApprovedAssistances
        ]);
    }
}
