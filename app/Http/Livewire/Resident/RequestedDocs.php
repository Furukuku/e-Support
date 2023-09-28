<?php

namespace App\Http\Livewire\Resident;

use Livewire\Component;

class RequestedDocs extends Component
{
    public $tab = 'pending';

    public function pending()
    {
        $this->tab = 'pending';
    }

    public function pickup()
    {
        $this->tab = 'pickup';
    }

    public function claimed()
    {
        $this->tab = 'claimed';
    }

    public function render()
    {
        return view('livewire.resident.requested-docs');
    }
}
