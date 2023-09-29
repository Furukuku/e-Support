<?php

namespace App\Http\Livewire\Resident\Reports;

use App\Models\Report;
use Livewire\Component;

class Solved extends Component
{
    public function render()
    {
        $solvedReports = Report::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Solved')
            ->orderBy('updated_at', 'desc')
            ->paginate(5, ['*'], 'solvedReports');
            
        return view('livewire.resident.reports.solved', ['solvedReports' => $solvedReports]);
    }
}
