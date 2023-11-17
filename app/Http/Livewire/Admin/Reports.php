<?php

namespace App\Http\Livewire\Admin;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Reports extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $report_from, $report_type, $zone, $description, $report_imgs, $time;

    public $status;

    public $report_id;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(
            'report_from',
            'report_type',
            'zone',
            'description',
            'report_imgs',
            'time',
            'status',
            'report_id',
        );
    }

    // public function mount()
    // {
    //     auth()->guard('admin')->user()->unreadNotifications->markAsRead();
    // }

    public function viewReport(Report $report)
    {
        $this->report_type = $report->report_name;
        $this->report_from = $report->user->fname . ' ' . $report->user->lname;
        $this->zone = $report->zone;
        $this->description = $report->description;
        $this->report_imgs = $report->images;
        $this->time = $report->created_at;

        $this->dispatchBrowserEvent('set-location', [
            'name' => $report->report_name,
            'lat' => $report->latitude,
            'long' => $report->longitude,
        ]);
    }

    public function editReport(Report $report)
    {
        $this->report_id = $report->id;
        $this->status = $report->status;
    }

    public function updateReport()
    {
        $report = Report::find($this->report_id);
        
        $report->status = $this->status;
        $report->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Report updated successfully']);
    }

    public function render()
    {
        $reports = Report::with('user')
            ->where('report_name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('zone', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->orWhereHas('user', function ($query) {
                $query->where('fname', 'like', '%' . $this->search . '%')
                ->orWhere('lname', 'like', '%' . $this->search . '%');
            })
            ->orderByRaw(
                "CASE
                    WHEN status = 'Pending' THEN 1
                    WHEN status = 'Ongoing' THEN 2
                    WHEN status = 'Solved' THEN 3
                    ELSE 3
                END"
            )
            ->orderBy('created_at', 'asc')
            ->paginate($this->paginate);

        $totalPendingReports = Report::where('status', 'Pending')->count();
        $totalOngoingReports = Report::where('status', 'Ongoing')->count();
        $totalSolvedReports = Report::where('status', 'Solved')->count();

        return view('livewire.admin.reports', [
            'reports' => $reports,
            'totalPendingReports' => $totalPendingReports,
            'totalOngoingReports' => $totalOngoingReports,
            'totalSolvedReports' => $totalSolvedReports,
        ]);
    }
}
