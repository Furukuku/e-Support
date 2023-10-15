<?php

namespace App\Http\Livewire\Resident;

use Livewire\Component;

class Services extends Component
{
    protected $listeners = ['changeTabValue' => 'services'];

    public $services_tab = 1;

    public function services()
    {
        $this->services_tab = 1;
    }

    public function documents()
    {
        $this->services_tab = 2;
    }

    public function reports()
    {
        $this->services_tab = 3;
    }

    public function render()
    {
        return view('livewire.resident.services');
    }
}
