<?php

namespace App\Http\Livewire\Resident;

use Livewire\Component;

class RequestedDocs extends Component
{
    public $docs_tab = 'pending';

    public function pending()
    {
        $this->docs_tab = 'pending';
    }

    public function pickup()
    {
        $this->docs_tab = 'pickup';
    }

    public function claimed()
    {
        $this->docs_tab = 'claimed';
    }

    public function render()
    {
        return view('livewire.resident.requested-docs');
    }
}
