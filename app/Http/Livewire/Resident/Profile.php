<?php

namespace App\Http\Livewire\Resident;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $mobile_no, $email, $zone, $employment_status, $gender, $username, $password, $password_confirmation;

    public $profile_img;

    public function mount()
    {
        $user = auth()->guard('web')->user();
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

    public function render()
    {
        return view('livewire.resident.profile');
    }
}
