<?php

namespace App\Http\Livewire\Resident\Reports;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Pending extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $pendingReports = Report::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'pending_reports');
            
        return view('livewire.resident.reports.pending', ['pendingReports' => $pendingReports]);
    }
}
