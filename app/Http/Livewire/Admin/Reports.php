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

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();
    }

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
    }

    public function render()
    {
        $reports = Report::with('user')
            ->where('report_name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('zone', 'like', '%' . $this->search . '%')
            ->orWhereHas('user', function ($query) {
                $query->where('fname', 'like', '%' . $this->search . '%')
                ->orWhere('lname', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.admin.reports', ['reports' => $reports]);
    }
}
