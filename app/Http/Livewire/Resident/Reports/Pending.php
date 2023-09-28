<?php

namespace App\Http\Livewire\Resident\Reports;

use App\Models\Report;
use Livewire\Component;

class Pending extends Component
{
    public function render()
    {
        $pendingReports = Report::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            
        return view('livewire.resident.reports.pending', ['pendingReports' => $pendingReports]);
    }
}
