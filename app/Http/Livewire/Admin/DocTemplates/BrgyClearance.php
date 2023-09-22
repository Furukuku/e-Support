<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use Livewire\Component;
use App\Models\Document;
use App\Models\BrgyOfficial;

class BrgyClearance extends Component
{
    public $document;

    public function mount(Document $document)
    {
        $this->document = $document;
    }
    
    public function render()
    {
        $captain = BrgyOfficial::where('position', 'Captain')->first();

        return view('livewire.admin.doc-templates.brgy-clearance', ['captain' => $captain]);
    }
}
