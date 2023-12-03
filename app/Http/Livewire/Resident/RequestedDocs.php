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

    public function toPickup()
    {
        $this->docs_tab = 'toPickup';
    }

    public function history()
    {
        $this->docs_tab = 'history';
    }

    public function render()
    {
        return view('livewire.resident.requested-docs');
    }
}
