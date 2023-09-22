<?php

namespace App\Http\Livewire\Resident;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Reports extends Component
{
    use WithFileUploads, WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $type_of_report, $zone, $report_image, $description;

    public $paginate = 5;
    
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function report()
    {
        $this->validate([
            'type_of_report' => ['required', 'string', 'max:16'],
            'zone' => ['required', 'string', 'max:1'],
            'report_image' => ['required', 'image'],
            'description' => ['required', 'string'],
        ]);

        $report_img_filename = $this->report_image->store('public/images/reports');

        Report::create([
            'user_id' => auth()->guard('web')->id(),
            'report_name' => $this->type_of_report,
            'zone' => $this->zone,
            'report_img' => $report_img_filename,
            'description' => $this->description,
        ]);

        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $reports = Report::where('user_id', auth()->guard('web')->id())
                ->where(function($query) {
                    $query->where('report_name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%')
                        ->orWhere('zone', 'like', '%' . $this->search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginate);

        // $report = Report::with('user')->get();
        // dd($report);

        // $reports = auth()->guard('web')->user()->reports
        //     ->where('report_name', 'like', '%' . $this->search . '%')
        //     ->orWhere('description', 'like', '%' . $this->search . '%')
        //     ->orWhere('zone', 'like', '%' . $this->search . '%')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate($this->paginate);

        return view('livewire.resident.reports', ['reports' => $reports]);
    }
}
