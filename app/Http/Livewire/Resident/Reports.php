<?php

namespace App\Http\Livewire\Resident;

use Livewire\Component;

class Reports extends Component
{
    public $tab = 'pending';

    public function pending()
    {
        $this->tab = 'pending';
    }

    public function ongoing()
    {
        $this->tab = 'ongoing';
    }

    public function solved()
    {
        $this->tab = 'solved';
    }

    public function render()
    {
        return view('livewire.resident.reports');
    }
}
