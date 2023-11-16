<?php

namespace App\Http\Livewire\Auth\Registration;

use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Resident extends Component
{
    use WithFileUploads;

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $email, $contact, $zone, $employment_status, $gender, $username, $password, $password_confirmation, $verification_image, $agreement;

    public $mobile;

    public $currentPage = 1;

    private $validations = [
        1 => [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix_name' => 'nullable|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:6',
            'employment_status' => 'required|boolean',
            'agreement' => 'accepted',
        ],
        2 => [
            'email' => 'required|email|unique:users|unique:businesses|unique:barangay_health_workers|unique:sub_admins|unique:admins|max:255',
            'mobile' => 'required|unique:users|digits:12',
            'zone' => 'required|string|max:2',
        ],
    ];

    protected $messages = [
        'mobile' => [
            'required' => 'The contact field is required.',
            'unique' => 'The contact has already been taken.',
            'digits' => 'The contact field must be 10 digits.',
        ],
    ];

    public function nextPage()
    {
        if($this->currentPage === 2){
            $this->mobile = 63 . $this->contact;
        }
        $this->validate($this->validations[$this->currentPage]);
        $this->currentPage++;
    }

    public function previousPage()
    {
        $this->currentPage--;
    }

    public function submit()
    {
        $this->validate([
            'profile_image' => 'required|image',
            'verification_image' => 'required|image',
            'username' => 'required|string|unique:users|unique:businesses|unique:barangay_health_workers|unique:sub_admins|unique:admins|min:4|max:20',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|max:255|confirmed',
        ]);

        // $this->currentPage++;

        $profile_img_filename = $this->profile_image->store('public/images/users/residents/profiles');

        $verification_img_filename = $this->verification_image->store('public/images/users/residents/verifications');

        $user = User::create([
            'profile' => $profile_img_filename,
            'verification_img' => $verification_img_filename,
            'lname' => $this->last_name,
            'fname' => $this->first_name,
            'mname' => $this->middle_name,
            'sname' => $this->suffix_name,
            'bday' => $this->birthday,
            'mobile' => $this->mobile,
            'mobile_verify_code' => random_int(111111, 999999),
            'mobile_verify_code_exp' => now()->addMinutes(3),
            'zone' => $this->zone,
            'is_employed' => $this->employment_status,
            'gender' => $this->gender,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        try{
            event(new Registered($user));
        }catch(Exception $e){
            return redirect()->route('resident.login')->with('not-send', 'Please check your internet connection and login your account then resend an otp code.');
        }

        Auth::login($user);

        return redirect()->route('resident.home');
    }

    public function render()
    {
        return view('livewire.auth.registration.resident');
    }
}
