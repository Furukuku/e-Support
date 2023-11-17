<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use App\Models\BrgyOfficial;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class Indigency extends Component
{
    public Document $document;

    public function release()
    {
        $this->document->status = 'Released';
        $this->document->is_released = true;

        if(Auth::guard('admin')->check()){
            $this->document->issued_by = auth()->guard('admin')->user()->username;
        }else if(Auth::guard('sub-admin')->check()){
            $this->document->issued_by = auth()->guard('sub-admin')->user()->fname . ' ' . auth()->guard('sub-admin')->user()->lname;
        }

        $this->document->update();

        $this->document->indigency->date_issued = now();
        $this->document->indigency->update();

        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('admin.docs.indigencies')->with('success', 'Document successfully released');
    }

    public function forPickup()
    {
        $this->document->status = 'Ready To Pickup';
        $this->document->update();

        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('admin.docs.indigencies')->with('success', 'Document updated successfully');
    }
    
    public function render()
    {
        $date = now()->day;
        $suffix = '';
        
        if($date % 100 >= 11 && $date % 100 <= 13){
            $suffix = 'th';
        }else{
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
        }

        $captain = BrgyOfficial::where('position', 'Captain')->first();

        return view('livewire.admin.doc-templates.indigency', [
            'suffix' => $suffix,
            'date' => $date,
            'captain' => $captain,
        ]);
    }
}
