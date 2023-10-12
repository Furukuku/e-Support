<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use App\Models\BrgyOfficial;
use Livewire\Component;
use App\Models\Document;

class BusinessClearance extends Component
{
    public Document $document;

    protected $listeners = ['confirm'];

    public function confirm()
    {
        if(is_null($this->document->user_id) && is_null($this->document->business_id)){
            $this->document->status = 'Released';
            $this->document->is_released = true;
            $this->document->update();

            $this->document->bizClearance->date_issued = now();
            $this->document->bizClearance->expiry_date = now()->addMonths(6);
            $this->document->bizClearance->update();
        }else{
            $this->document->status = 'Ready to Pickup';
            $this->document->update();
        }

        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('admin.docs.biz-clearance');
    }

    public function render()
    {
        $captain = BrgyOfficial::where('position', 'Captain')->first();

        $captain_name = null;

        if(!is_null($captain)){
            $captain_name = $captain->fname . ' '. $captain->mname[0] . '. ' . $captain->lname . ' ' . $captain->sname;
        }

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
