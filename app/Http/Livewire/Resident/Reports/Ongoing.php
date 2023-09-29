<?php

namespace App\Http\Livewire\Resident\Reports;

use App\Models\Report;
use Livewire\Component;

class Ongoing extends Component
{
    public function render()
    {
        $ongoingReports = Report::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Ongoing')
            ->orderBy('updated_at', 'desc')
            ->paginate(5, ['*'], 'ongoingReports');

        return view('livewire.resident.reports.ongoing', ['ongoingReports' => $ongoingReports]);
    }
}
