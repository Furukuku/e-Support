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
        $subAdmin = auth()->guard('sub-admin')->user();

        $this->validate([
            'username' => [
                'required', 
                'string', 
                'min:4',
                'max:20',
                'unique:sub_admins,username,' . $subAdmin->id, 
                'unique:admins,username,' . $subAdmin->username, 
                'unique:barangay_health_workers,username,' . $subAdmin->username, 
                'unique:users,username,' . $subAdmin->username, 
                'unique:businesses,username,' . $subAdmin->username
            ],
        ]);

        $sub = SubAdmin::find(auth()->guard('sub-admin')->user()->id);
        $sub->username = $this->username;
        $sub->update();

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
        $subAdmin = auth()->guard('sub-admin')->user();

        $this->validate([
            'email' => [
                'required', 
                'email',
                'max:255',
                'unique:sub_admins,email,' . $subAdmin->id, 
                'unique:admins,email,' . $subAdmin->email,
                'unique:barangay_health_workers,email,' . $subAdmin->email, 
                'unique:users,email,' . $subAdmin->email, 
                'unique:businesses,email,' . $subAdmin->email
            ],
        ]);

        $sub = SubAdmin::find(auth()->guard('sub-admin')->user()->id);
        $sub->email = $this->email;
        $sub->update();

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
            'new_password' => ['required', 'min:8', 'string', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
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
