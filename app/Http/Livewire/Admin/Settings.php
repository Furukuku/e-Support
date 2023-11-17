<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayInfo;
use App\Models\DocumentPrice;
use App\Models\EmergencyHotline;
use Livewire\Component;

class Settings extends Component
{
    // barangay info
    public $email, $telephone_no, $phone_no, $history, $mission, $vision;

    // emergency hotlines
    public $ems, $pnp, $bfp;

    // documents
    public $barangay_clearance, $business_clearance;

    // public $tab1, $tab2;
    public $brgyInfoTab = '';
    public $hotlinesTab = 'd-none';
    public $documentTab = 'd-none';

    // properties for triggering disabled attribute
    public $brgyInfoEdit = 'disabled';
    public $hotlinesEdit = 'disabled';
    public $documentEdit = 'disabled';

    public function brgyInfo()
    {
        $this->brgyInfoTab = '';
        $this->hotlinesTab = 'd-none';
        $this->documentTab = 'd-none';
    }

    public function hotlines()
    {
        $this->hotlinesTab = '';
        $this->brgyInfoTab = 'd-none';
        $this->documentTab = 'd-none';
    }

    public function document()
    {
        $this->documentTab = '';
        $this->hotlinesTab = 'd-none';
        $this->brgyInfoTab = 'd-none';
    }

    public function editBrgyInfo()
    {
        $this->brgyInfoEdit = '';
    }

    public function cancelEditBrgyInfo()
    {
        $this->resetErrorBag();
        $this->reset('email', 'telephone_no', 'phone_no', 'history', 'mission', 'vision');
        $this->brgyInfoEdit = 'disabled';
    }

    public function brgyInfoSave()
    {
        $this->validate([
            'email' => ['required', 'email', 'max:255'],
            'telephone_no' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'digits:11'],
            'history' => ['required', 'string'],
            'mission' => ['required', 'string'],
            'vision' => ['required', 'string'],
        ]);

        $brgyInfo = BarangayInfo::first();
        if(is_null($brgyInfo)){
            $newBrgyInfo = new BarangayInfo();
            $newBrgyInfo->email = $this->email;
            $newBrgyInfo->tel_no = $this->telephone_no;
            $newBrgyInfo->phone_no = $this->phone_no;
            $newBrgyInfo->history = $this->history;
            $newBrgyInfo->mission = $this->mission;
            $newBrgyInfo->vision = $this->vision;
            $newBrgyInfo->save();
        }else{
            $brgyInfo->email = $this->email;
            $brgyInfo->tel_no = $this->telephone_no;
            $brgyInfo->phone_no = $this->phone_no;
            $brgyInfo->history = $this->history;
            $brgyInfo->mission = $this->mission;
            $brgyInfo->vision = $this->vision;
            $brgyInfo->save();
        }

        $this->cancelEditBrgyInfo();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Brgy Info updated successfully']);
    }


    public function editHotlines()
    {
        $this->hotlinesEdit = '';
    }

    public function cancelEditHotlines()
    {
        $this->resetErrorBag();
        $this->reset('ems', 'pnp', 'bfp');
        $this->hotlinesEdit = 'disabled';
    }

    public function hotlinesSave()
    {
        $this->validate([
            'ems' => ['required', 'string', 'max:255'],
            'pnp' => ['required', 'string', 'max:255'],
            'bfp' => ['required', 'string', 'max:255'],
        ]);

        $hotlines = EmergencyHotline::first();
        if(is_null($hotlines)){
            $newHotlines = new EmergencyHotline();
            $newHotlines->ems = $this->ems;
            $newHotlines->pnp = $this->pnp;
            $newHotlines->bfp = $this->bfp;
            $newHotlines->save();
        }else{
            $hotlines->ems = $this->ems;
            $hotlines->pnp = $this->pnp;
            $hotlines->bfp = $this->bfp;
            $hotlines->save();
        }

        $this->cancelEditHotlines();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Hotlines updated successfully']);
    }

    public function editDocument()
    {
        $this->documentEdit = '';
    }

    public function cancelEditDocument()
    {
        $this->resetErrorBag();
        $this->reset('barangay_clearance', 'business_clearance');
        $this->documentEdit = 'disabled';
    }

    public function documentSave()
    {
        $this->validate([
            'barangay_clearance' => ['required', 'numeric', 'min:0', 'max:1000'],
            'business_clearance' => ['required', 'numeric', 'min:0', 'max:1000'],
        ]);

        $document = DocumentPrice::first();
        if(is_null($document)){
            $newDocument = new DocumentPrice();
            $newDocument->brgy_clearance = $this->barangay_clearance;
            $newDocument->biz_clearance = $this->business_clearance;
            $newDocument->save();
        }else{
            $document->brgy_clearance = $this->barangay_clearance;
            $document->biz_clearance = $this->business_clearance;
            $document->save();
        }

        $this->cancelEditDocument();
        $this->dispatchBrowserEvent('successToast', ['success' => 'Document prices updated successfully']);
    }

    public function render()
    {
        $brgyInfo = BarangayInfo::first();
        
        if(!is_null($brgyInfo)){
            $this->email = $brgyInfo->email;
            $this->telephone_no = $brgyInfo->tel_no;
            $this->phone_no = $brgyInfo->phone_no;
            $this->history = $brgyInfo->history;
            $this->mission = $brgyInfo->mission;
            $this->vision = $brgyInfo->vision;
        }

        $hotlines = EmergencyHotline::first();

        if(!is_null($hotlines)){
            $this->ems = $hotlines->ems;
            $this->pnp = $hotlines->pnp;
            $this->bfp = $hotlines->bfp;
        }

        $document = DocumentPrice::first();

        if(!is_null($document)){
            $this->barangay_clearance = $document->brgy_clearance;
            $this->business_clearance = $document->biz_clearance;
        }

        return view('livewire.admin.settings');
    }
}
