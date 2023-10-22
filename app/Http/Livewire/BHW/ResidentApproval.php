<?php

namespace App\Http\Livewire\BHW;

use App\Models\FamilyHead;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ResidentApproval extends Component
{
    use WithPagination;

    public $search = '';
    public $paginate = 5;

    public $paginate_value = [5, 10, 50, 100];

    protected $paginationTheme = 'bootstrap';

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $email, $contact, $zone, $employment_status, $gender, $family_head, $resident_verification_img;

    public $resident_id;

    public $head_id, $head_fullname;

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
            'family_head',
            'resident_verification_img',
            'resident_id',
            'head_id',
            'head_fullname',
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
        $this->family_head = $resident->is_head;
        $this->resident_verification_img = $resident->verification_img;
    }

    public function headOrNot()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('headOrNot');
    }

    public function isHead()
    {
        $head = FamilyHead::where('user_id', null)
            ->where(DB::raw('LOWER(fname)'), strtolower($this->first_name))
            ->where(DB::raw('LOWER(lname)'), strtolower($this->last_name))
            ->where('zone', $this->zone)
            ->whereDate('bday', $this->birthday)
            ->first();
        
        
        if(is_null($head)){
            $resident = User::find($this->resident_id);
            $resident->is_approved = true;
            $resident->is_head = true;
            $resident->update();
            $this->dispatchBrowserEvent('close-modal');
            $this->closeModal();
        }else{
            $this->head_id = $head->id;
            $this->head_fullname = $head->fullname;
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('headSuggest');
        }
    }

    public function notHead()
    {
        $resident = User::find($this->resident_id);
        $resident->is_approved = true;
        $resident->update();
        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    // public function checkIfHead()
    // {
    //     $head = FamilyHead::where('user_id', null)
    //         ->where(DB::raw('LOWER(fname)'), strtolower($this->first_name))
    //         ->where(DB::raw('LOWER(lname)'), strtolower($this->last_name))
    //         ->where('zone', $this->zone)
    //         ->whereDate('bday', $this->birthday)
    //         ->first();
        
        
    //     if(is_null($head)){
    //         $resident = User::find($this->resident_id);
    //         $resident->is_approved = true;
    //         $resident->update();
    //         $this->dispatchBrowserEvent('close-modal');
    //     }else{
    //         $this->head_id = $head->id;
    //         $this->head_fullname = $head->fullname;
    //         $this->dispatchBrowserEvent('close-modal');
    //         $this->dispatchBrowserEvent('headSuggest');
    //     }
    // }

    public function approve()
    {
        $resident = User::find($this->resident_id);
        $resident->is_approved = true;
        $resident->is_head = true;
        $resident->update();
        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function bindAccount()
    {
        $resident = User::find($this->resident_id);
        $resident->is_approved = true;
        $resident->is_head = true;
        $resident->update();

        $head = FamilyHead::find($this->head_id);
        $head->user_id = $this->resident_id;
        $head->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function rejectResidentConfirm(User $resident)
    {
        $this->resident_id = $resident->id;
    }

    public function reject()
    {
        User::find($this->resident_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function render()
    {
        $residents = User::where('is_approved', false)
            ->where(function ($query) {
                $query->where('lname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('fname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('mname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('sname', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'approvalPage');

        return view('livewire.b-h-w.resident-approval', ['residents' => $residents]);
    }
}
