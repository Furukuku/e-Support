<?php

namespace App\Http\Livewire\SubAdmin\Reports;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Solved extends Component
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
    public $sortDirection = 'desc';

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
        $this->resetPage('solvedPage');
    }
    
    public function render()
    {
        $reports = Report::with('user')
            ->where('status', 'Solved')
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
            ->paginate($this->paginate, ['*'], 'solvedPage');

        return view('livewire.sub-admin.reports.solved', ['reports' => $reports]);
    }
}
