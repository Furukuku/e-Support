<?php

namespace App\Http\Livewire\Business\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostJob extends Component
{
    use WithFileUploads;

    protected $listeners = ['submit'];

    public $page;

    public $job_title, $job_type, $workplace_type, $phone_number, $email, $address, $contact_person_name, $contact_person_position, $business_image, $job_description, $job_requirements;

    public function toFirst()
    {
        $this->page = 'one';
    }

    public function fromFirstToSecond()
    {
        $this->validate([
            'job_title' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'workplace_type' => ['required', 'string', 'max:255'],
        ]);

        $this->page = 'first-to-two';
    }

    public function fromLastToSecond()
    {
        $this->page = 'last-to-two';
    }

    public function toLast()
    {
        $this->validate([
            'phone_number' => ['required', 'digits:11'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contact_person_name' => ['required', 'string', 'max:255'],
            'contact_person_position' => ['required', 'string', 'max:255'],
        ]);

        $this->page = 'last';
    }

    public function submit()
    {
        $this->validate([
            'job_title' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'workplace_type' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'digits:11'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contact_person_name' => ['required', 'string', 'max:255'],
            'contact_person_position' => ['required', 'string', 'max:255'],
            'business_image' => ['nullable', 'image'],
            'job_description' => ['required', 'string'],
            'job_requirements' => ['required', 'string'],
        ]);

        if(Auth::guard('business')->check()){
            if(is_null($this->business_image)){
                Job::create([
                    'business_id' => auth()->guard('business')->id(),
                    'title' => $this->job_title,
                    'job_type' => $this->job_type,
                    'workplace_type' => $this->workplace_type,
                    'phone_number' => $this->phone_number,
                    'email' => $this->email,
                    'location' => $this->address,
                    'contact_person_name' => $this->contact_person_name,
                    'contact_person_position' => $this->contact_person_position,
                    'description' => $this->job_description,
                    'requirements' => $this->job_requirements,
                ]);
            }else{
                $business_img_filename = $this->business_image->store('public/images/biz-images');

                Job::create([
                    'business_id' => auth()->guard('business')->id(),
                    'title' => $this->job_title,
                    'job_type' => $this->job_type,
                    'workplace_type' => $this->workplace_type,
                    'phone_number' => $this->phone_number,
                    'email' => $this->email,
                    'location' => $this->address,
                    'contact_person_name' => $this->contact_person_name,
                    'contact_person_position' => $this->contact_person_position,
                    'business_img' => $business_img_filename,
                    'description' => $this->job_description,
                    'requirements' => $this->job_requirements,
                ]);
            }
        }

        return redirect()->route('business.home')->with('success', 'Job posted successfully');
    }

    public function render()
    {
        return view('livewire.business.jobs.post-job');
    }
}
