<?php

namespace App\Http\Livewire\Resident\Reports;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Ongoing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $ongoingReports = Report::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Ongoing')
            ->orderBy('updated_at', 'desc')
            ->paginate(5, ['*'], 'ongoing_reports');

        return view('livewire.resident.reports.ongoing', ['ongoingReports' => $ongoingReports]);
    }
}
