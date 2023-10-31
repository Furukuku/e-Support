<?php

namespace App\Http\Livewire\SubAdmin\DocTemplates;

use App\Models\BrgyOfficial;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BrgyClearance extends Component
{
    public Document $document;

    public $fee;

    public function closeModal()
    {
        $this->resetValidation();
        $this->resetErrorBag();
        $this->reset('fee');
    }

    public function release()
    {
        $this->validate([
            'fee' => ['required', 'numeric', 'min:0.01'],
        ]);

        $this->document->status = 'Released';
        $this->document->is_released = true;

        if(Auth::guard('admin')->check()){
            $this->document->issued_by = auth()->guard('admin')->user()->username;
        }else if(Auth::guard('sub-admin')->check()){
            $this->document->issued_by = auth()->guard('sub-admin')->user()->fname . ' ' . auth()->guard('sub-admin')->user()->lname;
        }
        
        $this->document->update();

        $this->document->brgyClearance->fee = $this->fee;
        $this->document->brgyClearance->date_issued = now();
        $this->document->brgyClearance->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        return redirect()->route('sub-admin.docs.brgy-clearances');
    }

    public function forPickup()
    {
        $this->document->status = 'Ready To Pickup';
        $this->document->update();

        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('sub-admin.docs.brgy-clearances');
    }
    
    public function render()
    {
        $captain = BrgyOfficial::where('position', 'Captain')->first();

        return view('livewire.sub-admin.doc-templates.brgy-clearance', ['captain' => $captain]);
    }
}
