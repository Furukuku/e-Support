<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use Livewire\Component;
use App\Models\Document;
use App\Models\BrgyOfficial;
use Illuminate\Support\Facades\Auth;

class BrgyClearance extends Component
{
    public Document $document;

    protected $listeners = ['confirm'];

    public function confirm()
    {
        $this->document->status = 'Released';
        $this->document->is_released = true;

        if(Auth::guard('admin')->check()){
            $this->document->issued_by = auth()->guard('admin')->user()->username;
        }else if(Auth::guard('sub-admin')->check()){
            $this->document->issued_by = auth()->guard('sub-admin')->user()->fname . ' ' . auth()->guard('sub-admin')->user()->lname;
        }
        
        $this->document->update();

        $this->document->brgyClearance->date_issued = now();
        $this->document->brgyClearance->update();

        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('admin.docs.brgy-clearance');
    }
    
    public function render()
    {
        $captain = BrgyOfficial::where('position', 'Captain')->first();

        return view('livewire.admin.doc-templates.brgy-clearance', ['captain' => $captain]);
    }
}
