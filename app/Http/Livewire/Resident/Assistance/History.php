<?php

namespace App\Http\Livewire\Resident\Assistance;

use App\Models\Assistance;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myAssistanceHistories = Assistance::where('user_id', auth()->guard('web')->id())
            ->where(function($query) {
                $query->where('status', 'Done')
                ->orWhere('status', 'Declined');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'AssistanceHistories');

        return view('livewire.resident.assistance.history', ['myAssistanceHistories' => $myAssistanceHistories]);
    }
}
