<?php

namespace App\Http\Livewire\Business;

use Livewire\Component;

class PostedJobs extends Component
{
    public $tab = 'offers';

    public function offers()
    {
        $this->tab = 'offers';
    }

    public function done()
    {
        $this->tab = 'done';
    }

    public function render()
    {
        return view('livewire.business.posted-jobs');
    }
}
