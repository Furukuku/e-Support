<?php

namespace App\Http\Livewire\SubAdmin\Reports;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Ongoing extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $report_from, $report_type, $zone, $description, $report_imgs, $time;

    public $status;

    public $report_id;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = '';

    public $sortBy = 'updated_at';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'desc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'desc'
            ? 'asc'
            : 'desc';
    }
    
    public function updatingSearch()
    {
        $this->resetPage('ongoingPage');
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

    public function viewReport(Report $report)
    {
        $this->report_id = $report->id;
        $this->report_type = $report->report_name;
        $this->report_from = $report->user->fname . ' ' . $report->user->lname;
        $this->zone = $report->zone;
        $this->description = $report->description;
        $this->report_imgs = $report->images;
        $this->status = $report->status;
        $this->time = $report->created_at;

        $this->dispatchBrowserEvent('set-location', [
            'name' => $report->report_name,
            'lat' => $report->latitude,
            'long' => $report->longitude,
        ]);
    }

    public function updateReport()
    {
        $report = Report::find($this->report_id);
        
        $report->status = 'Solved';
        $report->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Report updated successfully']);
    }

    public function render()
    {
        $reports = Report::with('user')
            ->where('status', 'Ongoing')
            ->where(function($query) {
                $inner_search = $this->search;
                $query->where('report_name', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('zone', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orWhereHas('user', function ($subQuery) use ($inner_search) {
                    $subQuery->where('fname', 'like', '%' . $inner_search . '%')
                    ->orWhere('lname', 'like', '%' . $inner_search . '%');
                });
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->paginate, ['*'], 'ongoingPage');

        return view('livewire.sub-admin.reports.ongoing', ['reports' => $reports]);
    }
}
