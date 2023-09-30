<?php

namespace App\Http\Livewire\Business\PostedJobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class DoneHiring extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $myDoneHiring = Job::where('business_id', auth()->guard('business')->id())
            ->where('done_hiring', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'doneHiring');

        return view('livewire.business.posted-jobs.done-hiring', ['myDoneHiring' => $myDoneHiring]);
    }
}
