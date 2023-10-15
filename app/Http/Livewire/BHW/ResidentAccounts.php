<?php

namespace App\Http\Livewire\BHW;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ResidentAccounts extends Component
{
    use WithPagination;

    public $search = '';
    public $paginate = 5;

    public $paginate_value = [5, 10, 50, 100];

    protected $paginationTheme = 'bootstrap';

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

        $heads = User::where('is_head', true)->count();
        $users = User::count();

        return view('livewire.b-h-w.resident-accounts', [
            'residents' => $residents,
            'heads' => $heads,
            'users' => $users,
        ]);
    }
}
