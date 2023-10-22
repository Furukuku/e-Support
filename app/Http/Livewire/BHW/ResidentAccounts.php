<?php

namespace App\Http\Livewire\BHW;

use App\Models\FamilyHead;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ResidentAccounts extends Component
{
    use WithPagination;

    public $search = '';
    public $paginate = 5;

    public $paginate_value = [5, 10, 50, 100];

    protected $paginationTheme = 'bootstrap';

    public $category = 0;

    public $profile_image, $last_name, $first_name, $middle_name, $suffix_name, $birthday, $email, $contact, $zone, $employment_status, $gender, $family_head;

    public $resident_id;

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
            'resident_id',
            'family_head'
        );
    }

    public function viewResident(User $resident)
    {
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
    }

    public function editResident(User $resident)
    {
        $this->resident_id = $resident->id;
        $this->family_head = $resident->is_head;
    }

    public function updateResident()
    {
        $this->validate([
            'family_head' => ['required', 'boolean'],
        ]);

        $resident = User::find($this->resident_id);
        $resident->is_head = $this->family_head;
        $resident->update();
        
        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
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
            ->paginate($this->paginate, ['*'], 'accountsPage');

        $heads = User::where('is_head', true)->count();
        $users = User::where('is_approved', true)->count();

        return view('livewire.b-h-w.resident-accounts', [
            'residents' => $residents,
            'heads' => $heads,
            'users' => $users,
        ]);
    }
}
