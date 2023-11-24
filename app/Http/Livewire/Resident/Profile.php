<?php

namespace App\Http\Livewire\Resident;

use App\Models\User;
use App\Rules\MobileNumberFormat;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    use WithFileUploads;

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $mobile_no, $email, $zone, $employment_status, $gender, $username;

    public $profile_img;

    public $passwordField = 'd-none';
    public $current_password, $new_password, $new_password_confirmation;

    protected $listeners = ['updateProfileAccount', 'changePassword'];

    public function mount()
    {
        $user = User::find(auth()->guard('web')->id());
        $this->profile_img = $user->profile;
        $this->last_name = $user->lname;
        $this->first_name = $user->fname;
        $this->middle_name = $user->mname;
        $this->suffix_name = $user->sname;
        $this->birthday = $user->bday;
        $this->email = $user->email;
        $this->zone = $user->zone;
        $this->employment_status = $user->is_employed;
        $this->gender = $user->gender;
        $this->username = $user->username;
        $this->mobile_no = $user->mobile;
    }

    public function updateProfileAccount()
    {
        $user = auth()->guard('web')->user();

        $this->validate([
            'profile_image' => ['nullable', 'image'],
            // 'last_name' => ['required', 'string', 'max:255'],
            // 'first_name' => ['required', 'string', 'max:255'],
            // 'middle_name' => ['nullable', 'string', 'max:255'],
            // 'suffix_name' => ['nullable', 'string', 'max:255'],
            // 'birthday' => ['required', 'date'],
            // 'gender' => ['required', 'string', 'max:6'],
            'employment_status' => ['required', 'boolean'],
            'zone' => ['required', 'string', 'max:2'],
            'mobile_no' => ['required', new MobileNumberFormat, 'unique:users,mobile,' . $user->id, 'digits:12'],
            'email' => [
                'required', 
                'email', 
                'unique:users,email,' . $user->id, 
                'unique:businesses,email,' . $user->email, 
                'unique:barangay_health_workers,email,' . $user->email, 
                'unique:sub_admins,email,' . $user->email,
                'unique:admins,email,' . $user->email,
                'max:255'
            ],
            'username' => [
                'required', 
                'string', 
                'min:4',
                'max:20',
                'unique:users,username,' . $user->id, 
                'unique:businesses,username,' . $user->username, 
                'unique:barangay_health_workers,username,' . $user->username, 
                'unique:sub_admins,username,' . $user->username,
                'unique:admins,username,' . $user->username,
            ],
        ]);

        $resident = User::find($user->id);
        // $resident->lname = $this->last_name;
        // $resident->fname = $this->first_name;
        // $resident->mname = $this->middle_name;
        // $resident->sname = $this->suffix_name;
        // $resident->bday = $this->birthday;
        // $resident->gender = $this->gender;
        $resident->zone = $this->zone;
        $resident->is_employed = $this->employment_status;
        $resident->username = $this->username;
        $resident->email = $this->email;

        
        $resident->mobile = $this->mobile_no;

        if($this->profile_image){
            Storage::delete($resident->profile);

            $profile_file_name = $this->profile_image->store('public/images/users/residents/profiles');
            $resident->profile = $profile_file_name;
        }

        $resident->update();
        $this->resetErrorBag();
        $this->mount();
        $this->dispatchBrowserEvent('refresh-page', [
            'username' => $this->username,
            'profileChanged' => 'Successfully updated!',
        ]);
    }

    public function cancelPassword()
    {
        $this->passwordField = 'd-none';
        $this->resetErrorBag('current_password', 'new_password', 'new_password_confirmation');
        $this->reset('current_password', 'new_password', 'new_password_confirmation');
    }

    public function changePassword()
    {
        // password format: /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%*()_\-+=|\\/&])/
        $this->validate([
            'current_password' => ['required', 'current_password:web'],
            'new_password' => ['required', 'min:8', 'string', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
        ]);
        
        if(Hash::check($this->current_password, auth()->guard('web')->user()->password)){
            User::where('id', auth()->guard('web')->user()->id)->update([
                'password' => Hash::make($this->new_password),
            ]);
        }

        $this->cancelPassword();
        $this->resetErrorBag('current_password', 'new_password', 'new_password_confirmation');
        $this->reset('current_password', 'new_password', 'new_password_confirmation');
        $this->dispatchBrowserEvent('success', ['success' => 'Password successfully changed!']);
    }

    public function render()
    {
        return view('livewire.resident.profile');
    }
}
