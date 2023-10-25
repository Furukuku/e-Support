<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use Livewire\Component;
use App\Models\Document;
use App\Models\BrgyOfficial;
use Illuminate\Support\Facades\Auth;

class BusinessClearance extends Component
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

        $this->document->bizClearance->fee = $this->fee;
        $this->document->bizClearance->date_issued = now();
        $this->document->bizClearance->expiry_date = now()->addMonths(6);
        $this->document->bizClearance->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
        return redirect()->route('admin.docs.biz-clearances');
    }

    public function forPickup()
    {
        $this->document->status = 'Ready To Pickup';
        $this->document->update();

        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('admin.docs.biz-clearances');
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
