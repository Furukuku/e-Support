<?php

namespace App\Http\Livewire\Business;

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

    public function claimed()
    {
        $this->docs_tab = 'claimed';
    }

    public function render()
    {
        return view('livewire.business.requested-docs');
    }
}