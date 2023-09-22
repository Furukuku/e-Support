<?php

namespace App\Http\Livewire\Admin\QrScanner;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BusinessClearance extends Component
{
    protected $listeners = ['getDocInfo'];

    public $token;

    public function getDocInfo($decodedText)
    {
        $qrcode = json_decode($decodedText);
        $this->token = $qrcode->token;
        // dd($this->qrcode_info);
        
        // return redirect()->route('admin.templates.biz-clearance', ['token' => $qrcode->token, 'id' => $qrcode->id]);
    }

    public function render()
    {
        return view('livewire.admin.qr-scanner.business-clearance');
    }
}
