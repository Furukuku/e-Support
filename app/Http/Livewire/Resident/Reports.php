<?php

namespace App\Http\Livewire\Resident;

use Livewire\Component;

class Reports extends Component
{
    public $reports_tab = 'pending';

    public function pending()
    {
        $this->reports_tab = 'pending';
    }

    public function ongoing()
    {
        $this->reports_tab = 'ongoing';
    }

    public function solved()
    {
        $this->reports_tab = 'solved';
    }

    public function render()
    {
        return view('livewire.resident.reports');
    }
}
