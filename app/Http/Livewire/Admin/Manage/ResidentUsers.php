<?php

namespace App\Http\Livewire\Admin\Manage;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ResidentUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public $category = 0;

    protected $listeners = ['closeModal'];

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $email, $contact, $zone, $employment_status, $gender, $resident_verification_img;

    public $resident_id;

    public $status;
    public $reason, $other;

    public function updatingSearch()
    {
        $this->resetPage('residentsPage');
    }

    public function resetVariables()
    {
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
            'resident_id',
            'resident_verification_img',
            'status',
            'reason',
            'other'
        );
    }

    public function closeModal()
    {
        $this->resetVariables();
    }

    public function viewResident($id)
    {
        $resident = User::find($id);
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
    }

    public function editResident($id)
    {
        $resident = User::find($id);
        
        $this->resident_id = $resident->id;
        $this->status = $resident->is_active;

        if(!is_null($resident->disable_msg)){
            switch($resident->disable_msg){
                case 'sample1': $this->reason = $resident->disable_msg;
                    break;
                case 'sample2': $this->reason = $resident->disable_msg;
                    break;
                case 'sample3': $this->reason = $resident->disable_msg;
                    break;
                case 'sample4': $this->reason = $resident->disable_msg;
                    break;
                case 'sample5': $this->reason = $resident->disable_msg;
                    break;
                default:
                    $this->reason = 'Other';
            }
    
            if($this->reason === 'Other'){
                $this->other = $resident->disable_msg;
            }
        }
    }

    public function updateResident()
    {
        $resident = User::find($this->resident_id);
        
        if($this->status == false){
            if($this->reason === 'Other'){
                $this->validate([
                    'other' => 'required|string|max:100',
                ]);
                
                $resident->disable_msg = $this->other;
            }else{
                $this->validate([
                    'reason' => 'required|string|max:100',
                ]);
                
                $resident->disable_msg = $this->reason;
            }
        }else{
            $this->validate([
                'status' => 'required|boolean'
            ]);

            $resident->disable_msg = null;
        }
        
        $resident->is_active = $this->status;
        $resident->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
        $this->resetErrorBag();
    }

    // public function archiveConfirmation($id)
    // {
    //     $resident = User::find($id);
    //     $this->resident_id = $resident->id;
    // }

    // public function archiveResident()
    // {
    //     User::find($this->resident_id)->delete();

    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->resetVariables();
    // }

    public function render()
    {
        $residents = User::where('is_approved', true)
            ->where(function ($query) {
                $query->where('lname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('fname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('mname', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('sname', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate, ['*'], 'residentsPage');

        return view('livewire.admin.manage.resident-users', [
            'residents' => $residents,
        ]);
    }
}
