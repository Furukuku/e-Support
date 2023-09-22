<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use App\Models\BrgyOfficial;
use Livewire\Component;
use App\Models\Document;

class Indigency extends Component
{
    public $document;

    public function mount(Document $document)
    {
        $this->document = $document;
    }
    
    public function render()
    {
        $date = now()->day;
        $suffix = '';
        
        switch($date % 10){
            case 1:
                $suffix = 'st';
                break;
            case 2:
                $suffix = 'nd';
                break;
            case 3:
                $suffix = 'rd';
                break;
            default:
                $suffix = 'th';
        }

        $captain = BrgyOfficial::where('position', 'Captain')->first();

        return view('livewire.admin.doc-templates.indigency', [
            'suffix' => $suffix,
            'date' => $date,
            'captain' => $captain,
        ]);
    }
}
