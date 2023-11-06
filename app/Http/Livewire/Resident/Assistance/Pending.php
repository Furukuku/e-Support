<?php

namespace App\Http\Livewire\Resident\Assistance;

use App\Models\Assistance;
use Livewire\Component;
use Livewire\WithPagination;

class Pending extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myPendingAssistances = Assistance::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'pendingAssistances');

        return view('livewire.resident.assistance.pending', ['myPendingAssistances' => $myPendingAssistances]);
    }
}
