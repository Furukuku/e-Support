<?php

namespace App\Http\Livewire\BHW;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DeclinedResident extends Component
{
    use WithPagination;

    public $search = '';
    public $paginate = 5;

    public $paginate_values = [5, 10, 50, 100];

    protected $paginationTheme = 'bootstrap';

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $email, $contact, $zone, $employment_status, $gender, $resident_verification_img;

    public $resident_id;

    public $reason;

    public function closeModal()
    {
        $this->resetValidation();
        $this->resetErrorBag();
        $this->reset(
            'profile_image',
            'last_name',
            'first_name',
            'middle_name',
            'suffix_name',
            'birthday',
            'email',
            'contact',
            'zone',
            'employment_status',
            'gender',
            'resident_verification_img',
            'resident_id',
            'reason'
        );
    }

    public function viewResident(User $resident)
    {
        $this->resident_id = $resident->id;
        $this->profile_image = $resident->profile;
        $this->last_name = $resident->lname;
        $this->first_name = $resident->fname;
        $this->middle_name = $resident->mname;
        $this->suffix_name = $resident->sname;
        $this->birthday = $resident->bday;
        $this->email = $resident->email;
        $this->contact = $resident->mobile;
        $this->zone = $resident->zone;
        $this->employment_status = $resident->is_employed;
        $this->gender = $resident->gender;
        $this->resident_verification_img = $resident->verification_img;
        $this->reason = $resident->decline_msg;
    }

    public function approve()
    {
        $resident = User::find($this->resident_id);
        $resident->decline_msg = null;
        $resident->is_approved = true;
        $resident->update();
        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function render()
    {
        $residents = User::where('is_approved', false)
            ->where('decline_msg', '!=', null)
            ->where(function ($query) {
                $query->where('lname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('fname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('mname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('sname', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'approvalPage');

        return view('livewire.b-h-w.declined-resident', ['residents' => $residents]);
    }
}
