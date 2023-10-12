<?php

namespace App\Http\Livewire\Admin\DocTemplates;

use App\Models\BrgyOfficial;
use Livewire\Component;
use App\Models\Document;

class Indigency extends Component
{
    public Document $document;

    protected $listeners = ['confirm'];

    public function confirm()
    {
        if(is_null($this->document->user_id) && is_null($this->document->business_id)){
            $this->document->status = 'Released';
            $this->document->is_released = true;
            $this->document->update();

            $this->document->indigency->date_issued = now();
            $this->document->indigency->update();
        }else{
            $this->document->status = 'Ready to Pickup';
            $this->document->update();
        }

        $this->dispatchBrowserEvent('close-modal');
        return redirect()->route('admin.docs.indigency');
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
