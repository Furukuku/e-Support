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

    public $search = "";

    public $category = 0;

    protected $listeners = ['closeModal'];

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $email, $contact, $zone, $employment_status, $gender;

    public $resident_id;

    public $status;

    public function updatingSearch()
    {
        $this->resetPage('residentsPage');
    }

    public function resetVariables()
    {
        $this->resident_id = '';
        $this->profile_image = '';
        $this->last_name = '';
        $this->first_name = '';
        $this->middle_name = '';
        $this->suffix_name = '';
        $this->birthday = '';
        $this->email = '';
        $this->contact = '';
        $this->zone = '';
        $this->employment_status = '';
        $this->gender = '';
        $this->status = '';
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
        $this->contact = $resident->contact;
        $this->zone = $resident->zone;
        $this->employment_status = $resident->employ_status;
        $this->gender = $resident->gender;
    }

    public function editResident($id)
    {
        $resident = User::find($id);
        
        $this->resident_id = $resident->id;
        $this->status = $resident->is_active;
    }

    public function updateResident()
    {
        $validated = $this->validate([
            'status' => 'required|integer|max:1'
        ]);

        if($validated){
            $converted_status = intval($this->status);
            
            $resident = User::find($this->resident_id);
    
            $resident->is_active = $converted_status;
            $resident->update();
    
            $this->dispatchBrowserEvent('close-modal');
            $this->resetVariables();
            $this->resetErrorBag();
        }
    }

    public function archiveConfirmation($id)
    {
        $resident = User::find($id);
        $this->resident_id = $resident->id;
    }

    public function archiveResident()
    {
        User::find($this->resident_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetVariables();
    }

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
