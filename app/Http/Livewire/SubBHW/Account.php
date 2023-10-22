<?php

namespace App\Http\Livewire\SubBHW;

use App\Models\BarangayHealthWorker;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Account extends Component
{
    public $username, $email, $current_password, $new_password, $new_password_confirmation;

    public $username_hidden = 'hidden';
    public $username_disabled = 'disabled';
    public $email_hidden = 'hidden';
    public $email_disabled = 'disabled';
    public $password_hidden = 'hidden';

    public function mount()
    {
        $this->username = auth()->guard('bhw')->user()->username;
        $this->email = auth()->guard('bhw')->user()->email;
    }

    public function resetPasswordInputs()
    {
        $this->current_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
    }
    
    public function editUsername()
    {
        $this->username_hidden = '';
        $this->username_disabled = '';
    }

    public function cancelUsername()
    {
        $this->resetErrorBag();
        $this->username_hidden = 'hidden';
        $this->username_disabled = 'disabled';
        $this->username = auth()->guard('bhw')->user()->username;
    }

    public function changeUsername()
    {
        $this->validate([
            'username' => 'required|string|unique:barangay_health_workers,username,' . auth()->guard('bhw')->user()->username . '|unique:admins,username,' . auth()->guard('bhw')->user()->username . '|unique:sub_admins,username,' . auth()->guard('bhw')->user()->id,
        ]);

        BarangayHealthWorker::where('id', auth()->guard('bhw')->user()->id)->update([
            'username' => $this->username,
        ]);

        $this->resetErrorBag();
        $this->username_hidden = 'hidden';
        $this->username_disabled = 'disabled';
        $this->dispatchBrowserEvent('refresh-page', [
            'username' => $this->username,
            'usernameChanged' => 'Username successfully changed!',
        ]);
    }

    public function editEmail()
    {
        $this->email_hidden = '';
        $this->email_disabled = '';
    }

    public function cancelEmail()
    {
        $this->resetErrorBag();
        $this->email_hidden = 'hidden';
        $this->email_disabled = 'disabled';
        $this->email = auth()->guard('bhw')->user()->email;
    }

    public function changeEmail()
    {
        $this->validate([
            'email' => 'required|email|unique:barangay_health_workers,email,' . auth()->guard('bhw')->user()->email . '|unique:admins,email,' . auth()->guard('bhw')->user()->email . '|unique:sub_admins,email,' . auth()->guard('bhw')->user()->id,
        ]);

        BarangayHealthWorker::where('id', auth()->guard('bhw')->user()->id)->update([
            'email' => $this->email,
        ]);

        $this->resetErrorBag();
        $this->email_hidden = 'hidden';
        $this->email_disabled = 'disabled';
        $this->dispatchBrowserEvent('success', ['success' => 'Email successfully changed!']);
    }

    public function editPassword()
    {
        $this->password_hidden = '';
    }

    public function cancelPassword()
    {
        $this->password_hidden = 'hidden';
        $this->resetPasswordInputs();
        $this->resetErrorBag();
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required|current_password:bhw',
            'new_password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
        ]);

        if(Hash::check($this->current_password, auth()->guard('bhw')->user()->password)){
            BarangayHealthWorker::where('id', auth()->guard('bhw')->user()->id)->update([
                'password' => Hash::make($this->new_password),
            ]);
        }

        $this->resetPasswordInputs();
        $this->password_hidden = 'hidden';
        $this->dispatchBrowserEvent('success', ['success' => 'Password successfully changed!']);
    }

    public function render()
    {
        return view('livewire.sub-b-h-w.account');
    }
}
