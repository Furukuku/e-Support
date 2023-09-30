<?php

namespace App\Http\Livewire\Business\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewJob extends Component
{
    use WithFileUploads;

    protected $listeners = ['submit', 'doneHiring'];

    public $job_title, $job_type, $workplace_type, $phone_number, $email, $location, $business_image, $job_description, $job_requirements, $done_hiring;

    public $view_biz_img, $requirements;

    public $edit = 'd-none';

    public $view = '';

    public $job_id;

    public function mount($id)
    {
        if(Auth::guard('business')->check()){
            $job = Job::where('id', $id)
                ->where('business_id', auth()->guard('business')->id())
                ->first();

            if(is_null($job)){
                abort(404);
            }else{
                $this->job_title = $job->title;
                $this->job_type = $job->job_type;
                $this->workplace_type = $job->workplace_type;
                $this->phone_number = $job->phone_number;
                $this->email = $job->email;
                $this->location = $job->location;
                $this->job_description = $job->description;
                $this->job_requirements = $job->requirements;
                $this->done_hiring = $job->done_hiring;

                $this->view_biz_img = $job->business_img;
                $this->requirements = explode(';', $job->requirements);
                $this->job_id = $id;
            }
        }
    }

    public function edit()
    {
        $this->view = 'd-none';
        $this->edit = '';
    }

    public function cancel()
    {
        $this->view = '';
        $this->edit = 'd-none';

        $this->mount($this->job_id);
        $this->reset('business_image');
    }

    public function doneHiring()
    {
        $job = Job::find($this->job_id);
        $job->done_hiring = true;
        $job->update();

        return redirect()->route('business.home');
    }

    public function submit()
    {
        $this->validate([
            'job_title' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'max:255'],
            'workplace_type' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'digits:11'],
            'email' => ['required', 'email', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'business_image' => ['nullable', 'image'],
            'job_description' => ['required', 'string'],
            'job_requirements' => ['required', 'string'],
        ]);

        if(Auth::guard('business')->check()){

            $job = Job::find($this->job_id);
            $job->title = $this->job_title;
            $job->job_type = $this->job_type;
            $job->workplace_type = $this->workplace_type;
            $job->phone_number = $this->phone_number;
            $job->email = $this->email;
            $job->location = $this->location;
            $job->description = $this->job_description;
            $job->requirements = $this->job_requirements;

            if(!is_null($this->business_image) && !is_null($job->business_img)){
                Storage::delete($job->business_img);
                $business_img_filename = $this->business_image->store('public/images/biz-images');
                $job->business_img = $business_img_filename;
            }
            else if(!is_null($this->business_image) && is_null($job->business_img)){
                $business_img_filename = $this->business_image->store('public/images/biz-images');
                $job->business_img = $business_img_filename;
            }

            if($job->done_hiring == true){
                $job->done_hiring = false;
                $job->update();

                return redirect()->route('business.home');
            }

            $job->update();

            $this->view_biz_img = $job->business_img;
        }
        
        $this->cancel();
    }

    public function render()
    {
        return view('livewire.business.jobs.view-job');
    }
}
