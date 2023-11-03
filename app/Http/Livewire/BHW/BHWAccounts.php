<?php

namespace App\Http\Livewire\BHW;

use App\Models\BarangayHealthWorker;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class BHWAccounts extends Component
{
    use WithPagination;

    public $search = '';
    public $paginate = 5;

    public $paginate_values = [5, 10, 50, 100];

    protected $paginationTheme = 'bootstrap';

    public $last_name, $first_name, $middle_name, $assigned_zone, $email, $username, $password, $password_confirmation;

    public $status;

    public $user_id;

    public function closeModal()
    {
        $this->resetValidation();
        $this->resetErrorBag();
        $this->reset(
            'last_name',
            'first_name',
            'middle_name',
            'assigned_zone',
            'email',
            'username',
            'password',
            'password_confirmation',
            'status',
            'user_id'
        );
    }

    public function createUser()
    {
        $this->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'assigned_zone' => ['required', 'string', 'max:1'],
            'email' => ['required', 'email', 'max:255', 'unique:barangay_health_workers', 'unique:sub_admins', 'unique:admins', 'unique:users', 'unique:businesses'],
            'username' => ['required', 'string', 'min:4', 'max:20', 'unique:barangay_health_workers', 'unique:sub_admins', 'unique:admins', 'unique:users', 'unique:businesses'],
            'password' => ['required', 'min:8', 'string', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', 'confirmed'],
        ]);

        BarangayHealthWorker::create([
            'lname' => $this->last_name,
            'fname' => $this->first_name,
            'mname' => $this->middle_name,
            'assigned_zone' => $this->assigned_zone,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function editUser(BarangayHealthWorker $subBhw)
    {
        $this->user_id = $subBhw->id;
        $this->status = $subBhw->is_active;
    }

    public function updateUser()
    {
        $this->validate([
            'status' => ['required', 'boolean']
        ]);

        $subBhw = BarangayHealthWorker::find($this->user_id);
        $subBhw->is_active = $this->status;
        $subBhw->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function archiveConfirmation(BarangayHealthWorker $subBhw)
    {
        $this->user_id = $subBhw->id;
    }

    public function archiveUser()
    {
        BarangayHealthWorker::find($this->user_id)->delete();
        
        $this->dispatchBrowserEvent('close-modal');
        $this->closeModal();
    }

    public function render()
    {
        $subBhws = BarangayHealthWorker::where('lname', 'LIKE', '%' . $this->search . '%')
            ->orWhere('fname', 'LIKE', '%' . $this->search . '%')
            ->orWhere('mname', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate);

        return view('livewire.b-h-w.b-h-w-accounts', ['subBhws' => $subBhws]);
    }
}
