<?php

namespace App\Http\Livewire\Admin\Manage;

use Livewire\Component;
use App\Models\SubAdmin;
use App\Rules\MustOnlyOneBHWHead;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Staffs extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $last_name, $first_name, $middle_name, $position, $email, $username, $password, $password_confirmation;

    public $status;

    public $user_id;

    public $paginate = 5;
    public $paginate_values = [5, 10, 50, 100];

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetInputs()
    {
        $this->last_name = '';
        $this->first_name = '';
        $this->middle_name = '';
        $this->position = '';
        $this->email = '';
        $this->username = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->status = '';
        $this->user_id = '';
    }

    public function closeModal()
    {
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function createUser()
    {
        $this->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'position' => ['required', 'string', 'max:20', new MustOnlyOneBHWHead],
            'email' => 'required|string|email|unique:barangay_health_workers|unique:sub_admins|unique:admins|unique:users|unique:businesses|max:255',
            'username' => 'required|string|min:4|max:20|unique:barangay_health_workers|unique:sub_admins|unique:admins|unique:users|unique:businesses',
            'password' => ['required', 'min:8', 'string', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
        ]);

        SubAdmin::create([
            'lname' => $this->last_name,
            'fname' => $this->first_name,
            'mname' => $this->middle_name,
            'position' => $this->position,
            'email' => $this->email,
            'username' => $this->username,
            'password' => Hash::make($this->password),
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
        $this->resetErrorBag();
    }

    public function editUser($id)
    {
        $user = SubAdmin::find($id);
        
        $this->user_id = $user->id;
        $this->status = $user->is_active;
    }

    public function updateUser()
    {
        $validated = $this->validate([
            'status' => 'required|boolean'
        ]);

        if($validated){
            $converted_status = intval($this->status);
            
            $user = SubAdmin::find($this->user_id);
    
            $user->is_active = $converted_status;
            $user->update();
    
            $this->dispatchBrowserEvent('close-modal');
            $this->resetInputs();
            $this->resetErrorBag();
        }
    }

    public function archiveConfirmation($id)
    {
        $user = SubAdmin::find($id);
        $this->user_id = $user->id;
    }

    public function archiveUser()
    {
        SubAdmin::find($this->user_id)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
    }

    public function render()
    {
        $subAdmins = SubAdmin::select('id', 'lname', 'fname', 'mname', 'position', 'email', 'is_active')
        ->orderBy('created_at', 'desc')
        ->paginate($this->paginate);

        return view('livewire.admin.manage.staffs', ['subAdmins' => $subAdmins]);
    }
}
