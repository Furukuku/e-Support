<?php

namespace App\Http\Livewire\Business\PostedJobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class JobOffers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myJobOffers = Job::where('business_id', auth()->guard('business')->id())
            ->where('done_hiring', false)
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'jobOffers');

        return view('livewire.business.posted-jobs.job-offers', ['myJobOffers' => $myJobOffers]);
    }
}
