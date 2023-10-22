<?php

namespace App\Http\Livewire\Resident\Reports;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Solved extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $solvedReports = Report::where('user_id', auth()->guard('web')->id())
            ->where('status', 'Solved')
            ->orderBy('updated_at', 'desc')
            ->paginate(5, ['*'], 'solved_reports');
            
        return view('livewire.resident.reports.solved', ['solvedReports' => $solvedReports]);
    }
}
