<?php

namespace App\Http\Livewire\Auth\Registration;

use App\Models\Admin;
use App\Models\Business;
use App\Notifications\PreRegisteredBusinessNotification;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;

use function PHPUnit\Framework\isEmpty;

class Company extends Component
{
    use WithFileUploads;

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $business_clearance, $business_name, $business_address, $business_nature, $email, $contact, $username, $password, $password_confirmation;

    public $mobile;

    public $agreement;

    public $currentPage = 1;

    private $validations = [
        1 => [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix_name' => 'nullable|string|max:255',
            'agreement' => 'accepted',
        ],
        2 => [
            'email' => 'required|email|unique:businesses|unique:users|unique:barangay_health_workers|unique:sub_admins|unique:admins|max:255',
            'mobile' => 'required|digits:12',
            'business_address' => 'required|string|max:255',
            'business_clearance' => 'required|image',
            'business_name' => 'required|string|max:255',
            'business_nature' => 'required|string|max:255',
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
            'username' => 'required|string|unique:users|unique:businesses|unique:barangay_health_workers|unique:sub_admins|unique:admins|min:4|max:20',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/|max:255|confirmed',
        ]);

        // $this->currentPage++;

        $profile_img_filename = $this->profile_image->store('public/images/users/businesses/profiles');

        $business_clearance_filename = $this->business_clearance->store('public/images/users/businesses/clearances');

        $user = Business::create([
            'profile' => $profile_img_filename,
            'biz_clearance' => $business_clearance_filename,
            'biz_name' => $this->business_name,
            'biz_address' => $this->business_address,
            'biz_nature' => $this->business_nature,
            'lname' => $this->last_name,
            'fname' => $this->first_name,
            'mname' => $this->middle_name,
            'sname' => $this->suffix_name,
            'mobile' => $this->mobile,
            'mobile_verify_code' => random_int(111111, 999999),
            'mobile_verify_code_exp' => now()->addMinutes(3),
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        try{
            event(new Registered($user));
        }catch(Exception $e){
            return redirect()->route('resident.login')->with('not-send', 'Please check your internet connection and login your account then resend an otp code.');
        }

        Auth::guard('business')->login($user);

        $admins = Admin::all();

        Notification::send($admins, new PreRegisteredBusinessNotification($user));

        return redirect()->route('business.home');
    }

    public function render()
    {
        return view('livewire.auth.registration.company');
    }
}
