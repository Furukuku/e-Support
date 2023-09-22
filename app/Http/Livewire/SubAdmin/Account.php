<?php

namespace App\Http\Livewire\SubAdmin;

use Livewire\Component;
use App\Models\SubAdmin;
use Illuminate\Support\Facades\Hash;

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
        $this->username = auth()->guard('sub-admin')->user()->username;
        $this->email = auth()->guard('sub-admin')->user()->email;
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
        $this->username = auth()->guard('sub-admin')->user()->username;
    }

    public function changeUsername()
    {
        $this->validate([
            'username' => 'required|string|unique:admins,username,' . auth()->guard('sub-admin')->user()->username . '|unique:sub_admins,username,' . auth()->guard('sub-admin')->user()->id,
        ]);

        SubAdmin::where('id', auth()->guard('sub-admin')->user()->id)->update([
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
        $this->email = auth()->guard('sub-admin')->user()->email;
    }

    public function changeEmail()
    {
        $this->validate([
            'email' => 'required|email|unique:admins,email,' . auth()->guard('sub-admin')->user()->email . '|unique:sub_admins,email,' . auth()->guard('sub-admin')->user()->id,
        ]);

        SubAdmin::where('id', auth()->guard('sub-admin')->user()->id)->update([
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
            'current_password' => 'required|current_password:sub-admin',
            'new_password' => 'required|string|confirmed',
        ]);

        if(Hash::check($this->current_password, auth()->guard('sub-admin')->user()->password)){
            SubAdmin::where('id', auth()->guard('sub-admin')->user()->id)->update([
                'password' => Hash::make($this->new_password),
            ]);
        }

        $this->resetPasswordInputs();
        $this->password_hidden = 'hidden';
        $this->dispatchBrowserEvent('success', ['success' => 'Password successfully changed!']);
    }

    public function render()
    {
        return view('livewire.sub-admin.account');
    }
}
