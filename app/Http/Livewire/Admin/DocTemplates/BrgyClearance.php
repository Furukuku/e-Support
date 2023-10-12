<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use Livewire\Component;
use App\Models\Document;
use App\Models\BrgyOfficial;

class BrgyClearance extends Component
{
    public Document $document;

    protected $listeners = ['confirm'];

    public function confirm()
    {
        if(is_null($this->document->user_id) && is_null($this->document->business_id)){
            $this->document->status = 'Released';
            $this->document->is_released = true;
            $this->document->update();

            $this->document->brgyClearance->date_issued = now();
            $this->document->brgyClearance->update();
        }else{
            $this->document->status = 'Ready to Pickup';
            $this->document->update();
        }

        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('admin.docs.brgy-clearance');
    }
    
    public function render()
    {
        $captain = BrgyOfficial::where('position', 'Captain')->first();

        return view('livewire.admin.doc-templates.brgy-clearance', ['captain' => $captain]);
    }
}
