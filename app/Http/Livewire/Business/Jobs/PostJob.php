<?php

namespace App\Http\Livewire\Business\Jobs;

use Livewire\Component;

class PostJob extends Component
{
    public $page;

    public $job_title, $job_type, $workplace_type, $phone_number, $email, $location, $job_description, $job_requirement;

    public function toFirst()
    {
        $this->page = 'one';
    }

    public function fromFirstToSecond()
    {
        $this->validate([
            'job_title' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'workplace_type' => ['required', 'string', 'max:255'],
        ]);

        $this->page = 'first-to-two';
    }

    public function fromLastToSecond()
    {
        $this->page = 'last-to-two';
    }

    public function toLast()
    {
        $this->validate([
            'phone_number' => ['required', 'digits:11'],
            'email' => ['required', 'email', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
        ]);

        $this->page = 'last';
    }

    public function submit()
    {
        $this->validate([
            'job_description' => ['required', 'string'],
            'job_requirement' => ['required', 'string'],
        ]);

        
    }

    public function render()
    {
        return view('livewire.business.jobs.post-job');
    }
}
