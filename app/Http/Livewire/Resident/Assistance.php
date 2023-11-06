<?php

namespace App\Http\Livewire\Resident;

use Livewire\Component;

class Assistance extends Component
{
    public $docs_tab = 'pending';

    public function pending()
    {
        $this->docs_tab = 'pending';
    }

    public function approved()
    {
        $this->docs_tab = 'approved';
    }

    public function history()
    {
        $this->docs_tab = 'history';
    }

    public function render()
    {
        return view('livewire.resident.assistance');
    }
}
