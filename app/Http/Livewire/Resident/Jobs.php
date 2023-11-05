<?php

namespace App\Http\Livewire\Resident;

use App\Models\Job;
use Livewire\Component;

class Jobs extends Component
{
    public $search = '';

    public function render()
    {
        $jobs = Job::with('business')
            ->where('done_hiring', false)
            ->where(function($query) {
                $query->where('title', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('job_type', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('workplace_type', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('location', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $this->search . '%')
                    ->whereHas('business', function($subQuery) {
                        $subQuery->where('biz_name', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('biz_nature', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('lname', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('fname', 'LIKE', '%' . $this->search . '%')
                            ->orWhere('mname', 'LIKE', '%' . $this->search . '%');
                    });
            })
            ->get();

        $jobs = Job::with('business')
            ->where('done_hiring', false)
            ->where(function ($query) {
                $searchTerm = '%' . $this->search . '%';
                $query->where(function ($innerQuery) use ($searchTerm) {
                    $innerQuery
                        ->where('title', 'LIKE', $searchTerm)
                        ->orWhere('job_type', 'LIKE', $searchTerm)
                        ->orWhere('workplace_type', 'LIKE', $searchTerm)
                        ->orWhere('location', 'LIKE', $searchTerm)
                        ->orWhere('description', 'LIKE', $searchTerm);
                })
                ->orWhereHas('business', function ($subQuery) use ($searchTerm) {
                    $subQuery
                        ->where('biz_name', 'LIKE', $searchTerm)
                        ->orWhere('biz_nature', 'LIKE', $searchTerm)
                        ->orWhere('lname', 'LIKE', $searchTerm)
                        ->orWhere('fname', 'LIKE', $searchTerm)
                        ->orWhere('mname', 'LIKE', $searchTerm);
                });
            })
            ->get();
        

        return view('livewire.resident.jobs', ['jobs' => $jobs]);
    }
}
