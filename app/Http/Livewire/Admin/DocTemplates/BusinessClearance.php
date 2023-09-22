<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use App\Models\BrgyOfficial;
use Livewire\Component;
use App\Models\Document;

class BusinessClearance extends Component
{
    public $document;

    public function mount(Document $document)
    {
        $this->document = $document;
    }

    public function render()
    {
        $captain = BrgyOfficial::where('position', 'Captain')->first();
        $captain_name = $captain->fname . ' '. $captain->mname[0] . '. ' . $captain->lname . ' ' . $captain->sname;

        $officials = BrgyOfficial::where('position', 'Kagawad')
            ->select('lname', 'fname', 'mname', 'sname')
            ->get();

        $sk = BrgyOfficial::where('position', 'Sk')
            ->select('lname', 'fname', 'mname', 'sname')
            ->first();
        $treasurer = BrgyOfficial::where('position', 'Treasurer')
            ->select('lname', 'fname', 'mname', 'sname')
            ->first();
        $secretary = BrgyOfficial::where('position', 'Secretary')
            ->select('lname', 'fname', 'mname', 'sname')
            ->first();
            
        return view('livewire.admin.doc-templates.business-clearance', [
            'captain_name' => $captain_name,
            'officials' => $officials,
            'sk' => $sk,
            'treasurer' => $treasurer,
            'secretary' => $secretary,
        ]);
    }
}
