<?php

namespace App\Http\Livewire\Admin;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Reports extends Component
{
    public $category = 0;

    public function render()
    {
        $totalPendingReports = Report::where('status', 'Pending')->count();
        $totalOngoingReports = Report::where('status', 'Ongoing')->count();
        $totalSolvedReports = Report::where('status', 'Solved')->count();

        return view('livewire.admin.reports', [
            'totalPendingReports' => $totalPendingReports,
            'totalOngoingReports' => $totalOngoingReports,
            'totalSolvedReports' => $totalSolvedReports,
        ]);
    }
}
