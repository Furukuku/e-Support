<?php

namespace App\Http\Livewire\Business;

use App\Models\Business;
use App\Rules\MobileNumberFormat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $mobile_no, $email, $username;

    public $business_name, $business_address, $business_nature;

    public $profile_img;

    public $passwordField = 'd-none';
    public $current_password, $new_password, $new_password_confirmation;

    protected $listeners = ['updateProfileAccount', 'changePassword'];

    public function mount()
    {
        $business = Business::find(auth()->guard('business')->id());
        $this->profile_img = $business->profile;
        $this->business_name = $business->biz_name;
        $this->business_address = $business->biz_address;
        $this->business_nature = $business->biz_nature;
        $this->last_name = $business->lname;
        $this->first_name = $business->fname;
        $this->middle_name = $business->mname;
        $this->suffix_name = $business->sname;
        $this->email = $business->email;
        $this->username = $business->username;
        $this->mobile_no = $business->mobile;
    }

    public function updateProfileAccount()
    {
        $business = auth()->guard('business')->user();

        $this->validate([
            'profile_image' => ['nullable', 'image'],
            'business_name' => ['required', 'string', 'max:255'],
            'business_address' => ['required', 'string', 'max:255'],
            'business_nature' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'suffix_name' => ['nullable', 'string', 'max:255'],
            'mobile_no' => ['required', new MobileNumberFormat, 'unique:businesses,mobile,' . $business->id, 'digits:12'],
            'email' => [
                'required', 
                'email', 
                'unique:businesses,email,' . $business->id, 
                'unique:users,email,' . $business->email, 
                'unique:barangay_health_workers,email,' . $business->email, 
                'unique:sub_admins,email,' . $business->email,
                'unique:admins,email,' . $business->email,
                'max:255'
            ],
            'username' => [
                'required', 
                'string', 
                'min:4',
                'max:20',
                'unique:businesses,username,' . $business->id, 
                'unique:users,username,' . $business->username, 
                'unique:barangay_health_workers,username,' . $business->username, 
                'unique:sub_admins,username,' . $business->username,
                'unique:admins,username,' . $business->username,
            ],
        ]);

        $business = Business::find($business->id);
        $business->biz_name = $this->business_name;
        $business->biz_address = $this->business_address;
        $business->biz_nature = $this->business_nature;
        $business->lname = $this->last_name;
        $business->fname = $this->first_name;
        $business->mname = $this->middle_name;
        $business->sname = $this->suffix_name;
        $business->username = $this->username;
        $business->email = $this->email;
        $business->mobile = $this->mobile_no;

        if($this->profile_image){
            Storage::delete($business->profile);

            $profile_file_name = $this->profile_image->store('public/images/users/businesses/profiles');
            $business->profile = $profile_file_name;
        }

        $business->update();
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
            'current_password' => ['required', 'current_password:business'],
            'new_password' => ['required', 'min:8', 'string', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
        ]);
        
        if(Hash::check($this->current_password, auth()->guard('business')->user()->password)){
            Business::where('id', auth()->guard('business')->user()->id)->update([
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
        return view('livewire.business.profile');
    }
}
